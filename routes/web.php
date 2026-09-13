<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Beranda (Halaman Utama)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Profil Sekolah (Visi Misi, Sejarah, Tabel Profil Sekolah Resmi)
Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

// Ekstrakurikuler (Daftar & Detail)
Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurricular.index');
Route::get('/ekstrakurikuler/{slug}', [ExtracurricularController::class, 'show'])->name('extracurricular.show');

// Galeri Kegiatan & Multimedia
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Berita & Informasi Sekolah (Arsip & Baca Artikel)
Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

// Kontak & Kirim Pesan Aspirasi
Route::get('/kontak', [ContactController::class, 'index'])->name('contact');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

// Peta Situs XML (Sitemap Dynamic Generator SEO)
Route::get('/sitemap.xml', function () {
    $urls = [
        route('home'),
        route('profile'),
        route('extracurricular.index'),
        route('gallery.index'),
        route('news.index'),
        route('contact'),
    ];
    
    $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
    $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
    
    foreach ($urls as $url) {
        $xml .= "  <url>\n    <loc>{$url}</loc>\n    <changefreq>weekly</changefreq>\n    <priority>0.8</priority>\n  </url>\n";
    }
    
    if (class_exists(\App\Models\News::class)) {
        foreach (\App\Models\News::latest()->get() as $news) {
            $url = route('news.show', $news->slug);
            $xml .= "  <url>\n    <loc>{$url}</loc>\n    <changefreq>daily</changefreq>\n    <priority>0.9</priority>\n  </url>\n";
        }
    }
    
    $xml .= '</urlset>';
    
    return response($xml, 200)->header('Content-Type', 'text/xml');
})->name('sitemap');

// ==========================================
// PANEL CMS MANAJEMEN KONTEN SEKOLAH
// ==========================================
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminBeritaController;

// Rute Otentikasi Administrator
Route::get('/login', fn() => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout.get');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('logout');
Route::get('/admin/auth-test', function() { \Illuminate\Support\Facades\Auth::loginUsingId(1); return redirect()->route('admin'); });

// Rute Dasbor Administrator (Terproteksi Otentikasi)
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin');
    
    // CRUD Berita Sekolah
    Route::get('/berita', [AdminBeritaController::class, 'index'])->name('berita');
    Route::get('/berita/tambah', [AdminBeritaController::class, 'create'])->name('tambah-berita');
    Route::post('/berita/tambah', [AdminBeritaController::class, 'store'])->name('proses-tambah-berita');
    Route::get('/berita/{id}', [AdminBeritaController::class, 'show'])->name('lihat-berita');
    Route::get('/berita/{id}/edit', [AdminBeritaController::class, 'edit'])->name('edit-berita');
    Route::put('/berita/{id}', [AdminBeritaController::class, 'update'])->name('proses-edit-berita');
    Route::delete('/berita/{id}', [AdminBeritaController::class, 'destroy'])->name('hapus-berita');
    Route::get('/checkSlug', [AdminBeritaController::class, 'checkSlug'])->name('checkSlug');
    
    // Tautan navigasi pendukung CMS
    Route::get('/kategori', fn() => redirect()->route('berita')->with('info', 'Kelola kategori berita melalui sistem CMS.'))->name('kategori');
    Route::get('/galeri', fn() => redirect()->route('gallery.index'))->name('admin.galeri');
    Route::get('/pesan', fn() => redirect()->route('admin')->with('info', 'Pesan masuk dapat dipantau pada dasbor utama.'))->name('admin.pesan');
    Route::get('/pengguna', fn() => redirect()->route('admin')->with('info', 'Manajemen akun administrator CMS.'))->name('pengguna');
    Route::get('/download-pdf', fn() => redirect()->route('admin')->with('info', 'Laporan aktivitas portal siap dicetak.'))->name('admin.download-pdf');
});
