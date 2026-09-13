<?php

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolWebsiteTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function test_home_page_renders_successfully_with_school_stats_and_swiper(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);
        $response->assertSee('SMA Negeri 1 Harapan Bangsa');
        $response->assertSee('SEMANGAT SPMB');
        $response->assertSee('Sambutan Kepala Sekolah');
        $response->assertSee('Statistik Data Sekolah');
    }

    public function test_profile_page_renders_official_school_profile_table(): void
    {
        $profile = SchoolProfile::first();
        $response = $this->get(route('profile'));

        $response->assertStatus(200);
        $response->assertSee('Tabel Informasi Profil Sekolah');
        $response->assertSee('Nomor Pokok Sekolah Nasional (NPSN)');
        $response->assertSee('20108921');
        $response->assertSee('Akreditasi A');
        $response->assertSee($profile->principal_name);
        $response->assertSee('Bambang Kurniawan, S.Kom.');
        $response->assertSee('Jl. Pendidikan No. 45');
    }

    public function test_extracurricular_index_and_detail_page(): void
    {
        $response = $this->get(route('extracurricular.index'));
        $response->assertStatus(200);
        $response->assertSee('Paskibra');
        $response->assertSee('Pramuka');

        $firstEkskul = Extracurricular::first();
        $detailResponse = $this->get(route('extracurricular.show', $firstEkskul->slug));
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($firstEkskul->name);
        $detailResponse->assertSee($firstEkskul->coach_name);
    }

    public function test_gallery_page_renders_successfully(): void
    {
        $response = $this->get(route('gallery.index'));
        $response->assertStatus(200);
        $response->assertSee('Galeri Kegiatan Sekolah');
        $response->assertSee('Semua Koleksi');
    }

    public function test_news_page_and_detail_article(): void
    {
        $response = $this->get(route('news.index'));
        $response->assertStatus(200);
        $response->assertSee('Kabar');
        $response->assertSee('Semua Topik');

        $firstNews = News::first();
        $detailResponse = $this->get(route('news.show', $firstNews->slug));
        $detailResponse->assertStatus(200);
        $detailResponse->assertSee($firstNews->title);
        $detailResponse->assertSee($firstNews->author);
    }

    public function test_contact_page_and_message_submission(): void
    {
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
        $response->assertSee('Hubungi Pihak Sekolah');

        $postResponse = $this->post(route('contact.store'), [
            'name' => 'Budi Pratama',
            'email' => 'budi@example.com',
            'phone' => '08123456789',
            'subject' => 'Pertanyaan Ekstrakurikuler',
            'message' => 'Apakah siswa kelas X boleh memilih 2 ekstrakurikuler sekaligus?',
        ]);

        $postResponse->assertRedirect(route('contact'));
        $postResponse->assertSessionHas('success');

        $this->assertDatabaseHas('contact_messages', [
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Ekstrakurikuler',
        ]);
    }

    public function test_navigation_page_loader_rendered_and_no_emojis_in_views(): void
    {
        $routes = ['home', 'profile', 'extracurricular.index', 'gallery.index', 'news.index', 'contact'];
        $emojiPattern = '/[\x{1F300}-\x{1F5FF}\x{1F600}-\x{1F64F}\x{1F680}-\x{1F6FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}\x{1F900}-\x{1F9FF}\x{1F1E0}-\x{1F1FF}]/u';

        foreach ($routes as $routeName) {
            $response = $this->get(route($routeName));
            $response->assertStatus(200);
            $response->assertSee('id="page-progress-bar"', false);

            $content = $response->getContent();
            $this->assertSame(0, preg_match($emojiPattern, $content), "Found emoji in route: {$routeName}");
        }

        $firstEkskul = Extracurricular::first();
        $ekskulResponse = $this->get(route('extracurricular.show', $firstEkskul->slug));
        $ekskulResponse->assertStatus(200);
        $this->assertSame(0, preg_match($emojiPattern, $ekskulResponse->getContent()));
        $ekskulResponse->assertDontSee('🏆');
    }

    public function test_admin_cms_login_authentication_and_dashboard_access(): void
    {
        // 1. Akses /admin tanpa login harus dialihkan ke login
        $guestResponse = $this->get(route('admin'));
        $guestResponse->assertRedirect(route('admin.login'));

        // 2. Formulir login terbuka dengan sukses
        $loginPageResponse = $this->get(route('admin.login'));
        $loginPageResponse->assertStatus(200);
        $loginPageResponse->assertSee('Panel CMS');
        $loginPageResponse->assertSee('Manajemen Konten Sekolah');
        $loginPageResponse->assertSee('admin@sekolah.web.id');

        // 3. Login dengan kredensial yang valid
        $loginResponse = $this->post(route('admin.login.submit'), [
            'email' => 'admin@sekolah.web.id',
            'password' => 'password',
        ]);
        $loginResponse->assertRedirect(route('admin'));
        $this->assertAuthenticated();

        // 4. Akses halaman Dasbor Admin CMS
        $dashboardResponse = $this->get(route('admin'));
        $dashboardResponse->assertStatus(200);
        $dashboardResponse->assertSee('Dasbor Panel CMS');
        $dashboardResponse->assertSee('Ringkasan Data Pokok Sekolah');
        $dashboardResponse->assertSee('Berita & Kegiatan', false);
        $dashboardResponse->assertSee('Galeri Foto');
        $dashboardResponse->assertSee('Ekstrakurikuler');
        $dashboardResponse->assertSee('Pesan Masuk');

        // 5. Verifikasi Akses CRUD Berita Admin
        $beritaCrudResponse = $this->get(route('berita'));
        $beritaCrudResponse->assertStatus(200);
        $beritaCrudResponse->assertSee('Kelola Berita');
    }
}
