<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Profil Sekolah
        SchoolProfile::truncate();
        SchoolProfile::create([
            'name' => 'SMA Negeri 1 Harapan Bangsa',
            'npsn' => '20108921',
            'education_level' => 'Sekolah Menengah Atas (SMA)',
            'status' => 'Negeri',
            'accreditation' => 'A (Unggul) - BAN-S/M',
            'sk_pendirian' => '421.3/SK-108/DISDIK/1986',
            'sk_pendirian_date' => '14 Juli 1986',
            'sk_izin_operasional' => '021/Kep/I/1987',
            'principal_name' => 'Agus Hasan Sadzili, S.Pd',
            'principal_nip' => '19700815 199503 1 002',
            'dapodik_operator' => 'Bambang Kurniawan, S.Kom.',
            'address' => 'Jl. Pendidikan No. 45, Kompleks Cendekia',
            'rt_rw' => '004 / 012',
            'village' => 'Sukamaju',
            'district' => 'Cibeunying Kidul',
            'city' => 'Kota Bandung',
            'province' => 'Jawa Barat',
            'postal_code' => '40123',
            'phone' => '(022) 7208945',
            'email' => 'info@sman1harapanbangsa.sch.id',
            'website' => 'https://sman1harapanbangsa.sch.id',
            'land_area' => '14.250 m²',
            'building_area' => '7.850 m²',
            'internet_access' => 'Dedicated Fiber Optic 300 Mbps',
            'electricity_power' => '33.000 VA',
            'student_count' => 1238,
            'teacher_count' => 58,
            'staff_count' => 17,
            'classroom_count' => 33,
            'extracurricular_count' => 12,
            'vision' => 'Terwujudnya insan cendekia yang berakhlak mulia, berprestasi global, menguasai sains dan teknologi, serta berwawasan lingkungan hidup.',
            'mission' => [
                'Menyelenggarakan pembelajaran berkualitas dengan kurikulum adaptif dan penguatan nalar kritis.',
                'Menanamkan nilai-nilai religius, budi pekerti luhur, dan profil pelajar Pancasila dalam seluruh aspek kehidupan sekolah.',
                'Meningkatkan kapasitas profesional pendidik dan tenaga kependidikan secara terencana dan berkelanjutan.',
                'Menyediakan fasilitas riset, laboratorium teknologi, kesenian, serta keolahragaan berstandar prima.',
                'Menciptakan lingkungan belajar yang asri, adiwiyata, ramah anak, dan bebas dari diskriminasi maupun perundungan.',
                'Membangun sinergi kolaboratif antara sekolah, orang tua siswa, alumni, perguruan tinggi, dan dunia industri.'
            ],
            'history' => 'SMA Negeri 1 Harapan Bangsa didirikan pada tanggal 14 Juli 1986 atas prakarsa para tokoh pendidikan dan masyarakat yang bertekad menghadirkan sekolah menengah unggulan berwawasan kebangsaan. Berawal dari fasilitas sederhana dengan 4 ruang kelas dan 120 siswa angkatan pertama, sekolah ini terus melesat menjadi salah satu SMA rujukan terdepan di Jawa Barat dengan tradisi prestasi akademik dan kepemimpinan pemuda yang membanggakan.',
            'principal_welcome' => 'Assalamu’alaikum Warahmatullahi Wabarakatuh, salam sejahtera untuk kita semua. Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa atas hadirnya situs resmi SMA Negeri 1 Harapan Bangsa. Di era keterbukaan informasi dan percepatan digital saat ini, website ini kami persembahkan sebagai sarana komunikasi yang transparan, akuntabel, dan interaktif bagi seluruh peserta didik, orang tua, alumni, maupun masyarakat luas. Kami percaya bahwa pendidikan sejati bukan hanya tentang kecerdasan intelektual, tetapi juga ketangguhan karakter dan kemanusiaan. Selamat menjelajahi profil, program, dan prestasi sekolah kami.',
            'principal_image' => '/images/kepala-sekolah.jpg',
        ]);

        // 2. Berita & Kegiatan Sekolah
        News::truncate();
        $newsItems = [
            [
                'title' => 'Siswa SMAN 1 Harapan Bangsa Raih Medali Emas Olimpiade Sains Nasional 2026',
                'category' => 'Prestasi',
                'excerpt' => 'Prestasi membanggakan kembali ditorehkan oleh ananda Muhammad Rayhan Pratama yang berhasil meraih medali emas pada ajang OSN tingkat nasional.',
                'content' => "SMA Negeri 1 Harapan Bangsa kembali menorehkan tinta emas dalam kancah nasional. Pada ajang Olimpiade Sains Nasional (OSN) 2026 yang diselenggarakan oleh Balai Pengembangan Talenta Indonesia (BPTI) Kemendikdasmen, siswa kelas XI MIPA 1, Muhammad Rayhan Pratama, berhasil membawa pulang medali emas untuk bidang Astronomi dan Kebumian.\n\nKepala Sekolah Drs. H. Ahmad Sudrajat, M.Pd. menyampaikan apresiasi setinggi-tingginya kepada Rayhan dan tim guru pembimbing yang telah mendedikasikan waktu intensif selama berbulan-bulan. 'Prestasi ini menjadi bukti nyata komitmen sekolah dalam membina talenta sains siswa secara terstruktur dan terukur,' ujarnya saat seremoni penyambutan di halaman sekolah.",
                'author' => 'Tim Humas & Prestasi',
                'image' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(2),
                'views' => 412,
                'is_featured' => true,
            ],
            [
                'title' => 'Pameran Karya P5: Siswa Tampilkan Inovasi Kewirausahaan Berkelanjutan dan Seni Tradisi',
                'category' => 'Kegiatan',
                'excerpt' => 'Ratusan siswa kelas X dan XI memamerkan produk olahan ramah lingkungan dan pertunjukan kesenian daerah dalam Gelar Karya Proyek Penguatan Profil Pelajar Pancasila.',
                'content' => "Halaman utama SMAN 1 Harapan Bangsa dipadati pengunjung dalam Gelar Karya P5 yang berlangsung meriah selama dua hari berturut-turut. Mengusung tema 'Gaya Hidup Berkelanjutan dan Kearifan Lokal', para peserta didik menyajikan inovasi produk daur ulang bernilai ekonomis tinggi serta kuliner tradisional nusantara.\n\nKegiatan ini tidak hanya melatih jiwa entrepreneurship siswa, melainkan juga menanamkan kerja sama tim, kemandirian, dan kepedulian terhadap kelestarian alam sekitar. Pameran ini turut dihadiri perwakilan Dinas Pendidikan dan orang tua siswa yang antusias memberikan dukungan.",
                'author' => 'Koordinator P5',
                'image' => 'https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(6),
                'views' => 285,
                'is_featured' => true,
            ],
            [
                'title' => 'Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK) 2026 Berjalan Lancar & Tertib',
                'category' => 'Akademik',
                'excerpt' => 'Sebanyak 50 siswa terpilih mengikuti ANBK di 2 laboratorium komputer sekolah dengan infrastruktur jaringan gigabit dan suplai daya cadangan UPS penuh.',
                'content' => "Pelaksanaan Asesmen Nasional Berbasis Komputer (ANBK) tahun 2026 di SMAN 1 Harapan Bangsa berlangsung sukses tanpa kendala teknis. Dilaksanakan dalam dua sesi harian, asesmen mencakup penilaian literasi membaca, numerasi, dan survei lingkungan belajar.\n\nSekolah telah mempersiapkan sarana laboratorium komputer dengan koneksi internet fiber optik berkecepatan 300 Mbps serta genset darurat untuk memastikan kenyamanan peserta. Pengawas silang dari sekolah mitra memuji kedisiplinan dan kesiapan sistem yang ditunjukkan oleh panitia.",
                'author' => 'Panitia ANBK',
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(12),
                'views' => 198,
                'is_featured' => true,
            ],
            [
                'title' => 'Peresmian Ruang Multimedia Interaktif & Perpustakaan Digital Berbasis Cloud',
                'category' => 'Fasilitas',
                'excerpt' => 'Menjawab tantangan pembelajaran abad 21, sekolah meresmikan modernisasi ruang multimedia interaktif dan katalog perpustakaan berbasis digital.',
                'content' => "Untuk menunjang proses pembelajaran yang semakin kolaboratif dan dinamis, SMAN 1 Harapan Bangsa meresmikan operasional Ruang Multimedia Interaktif baru. Ruang ini dilengkapi panel layar sentuh 85 inci, audio studio, dan perangkat komputer workstation untuk kreasi konten siswa.\n\nSelain itu, perpustakaan sekolah kini mengintegrasikan sistem katalog digital berbasis cloud yang memungkinkan siswa meminjam ribuan buku elektronik dari perangkat ponsel pintar mereka kapan saja dan di mana saja.",
                'author' => 'Kepala Sarpras',
                'image' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(18),
                'views' => 174,
                'is_featured' => false,
            ],
            [
                'title' => 'Sosialisasi Pencegahan Perundungan (Anti-Bullying) & Disiplin Positif Ramah Anak',
                'category' => 'Pengumuman',
                'excerpt' => 'Bekerja sama dengan praktisi psikologi anak dan aparat kepolisian, sekolah mengadakan lokakarya pembinaan karakter ramah anak bagi seluruh peserta didik.',
                'content' => "SMAN 1 Harapan Bangsa menegaskan komitmen nol toleransi terhadap segala bentuk perundungan (bullying) dan kekerasan di lingkungan pendidikan. Melalui program pembinaan berkala, seluruh siswa diajak memahami pentingnya rasa empati, komunikasi asertif, dan pelaporan yang aman.\n\nTim Pencegahan dan Penanganan Kekerasan (TPPK) sekolah juga telah menyediakan kanal konseling tatap muka dan daring agar setiap siswa merasa aman, dihargai, dan terlindungi saat menuntut ilmu.",
                'author' => 'Guru BK & TPPK',
                'image' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(25),
                'views' => 240,
                'is_featured' => false,
            ],
            [
                'title' => 'Pramuka SMAN 1 Raih Juara Umum Lomba Ketangkasan Baris-Berbaris Tingkat Jawa Barat',
                'category' => 'Prestasi',
                'excerpt' => 'Regu Pramuka Ambalan Wijayakusuma membuktikan kekompakan dengan meraih 4 piala kategori sekaligus pada kompetisi penegak se-Jawa Barat.',
                'content' => "Kabar gembira datang dari bidang kepramukaan. Pasukan Pramuka Penegak SMAN 1 Harapan Bangsa dinobatkan sebagai Juara Umum Lomba Ketangkasan Baris Berbaris dan Pionering 2026.\n\nLatihan kedisiplinan dan fisik yang dilakukan secara konsisten selama dua bulan membuahkan hasil memuaskan. Tropi bergilir diserahkan langsung oleh Kwartir Daerah kepada pradana putra dan putri pada apel bendera hari Senin.",
                'author' => 'Pembina Pramuka',
                'image' => 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?auto=format&fit=crop&w=800&q=80',
                'published_at' => now()->subDays(30),
                'views' => 310,
                'is_featured' => false,
            ],
        ];

        foreach ($newsItems as $item) {
            News::create(array_merge($item, [
                'slug' => Str::slug($item['title']),
            ]));
        }

        // 3. Ekstrakurikuler
        Extracurricular::truncate();
        $ekskulItems = [
            [
                'name' => 'Paskibra (Pasukan Pengibar Bendera)',
                'category' => 'Keorganisasian',
                'description' => 'Membentuk kedisiplinan tingkat tinggi, ketahanan fisik, postur tegak, rasa cinta tanah air, dan keterampilan baris-berbaris formal kenegaraan.',
                'coach_name' => 'Kapten (Purn) Hendra Gunawan & Rian Hidayat, S.Pd.',
                'schedule' => 'Selasa & Jumat, 15.30 - 17.15 WIB',
                'location' => 'Lapangan Utama Sekolah',
                'image' => 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Unggulan',
                'achievements' => 'Juara 1 LKBB Tingkat Provinsi Jawa Barat 2025, Pengibar Bendera Pusaka Kota Bandung',
            ],
            [
                'name' => 'Pramuka Gugus Depan Wijayakusuma',
                'category' => 'Keorganisasian',
                'description' => 'Wadah pembentukan watak kesatria, kemandirian survival outdoor, tali temali, sandi morse, kepedulian sosial, dan kepemimpinan penegak.',
                'coach_name' => 'Drs. Maman Suryaman & Siti Rahmawati, S.Pd.',
                'schedule' => 'Rabu, 15.30 - 17.00 WIB',
                'location' => 'Sanggar Pramuka & Bumi Perkemahan',
                'image' => 'https://images.unsplash.com/photo-1478131143081-80f7f84ca84d?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Wajib Pilihan',
                'achievements' => 'Juara Umum Raimuna Cabang 2025, Regu Terbaik Pionering Konstruksi Jembatan Darurat',
            ],
            [
                'name' => 'Palang Merah Remaja (PMR Wira)',
                'category' => 'Kemanusiaan',
                'description' => 'Melatih keterampilan pertolongan pertama pada kecelakaan (P3K), kesiapsiagaan bencana alam, donor darah, dan kepedulian kesehatan remaja.',
                'coach_name' => 'dr. Dian Anggraini & Nurul Fitriani, S.Kep.',
                'schedule' => 'Kamis, 15.30 - 17.00 WIB',
                'location' => 'Ruang UKS & Aula Timur',
                'image' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Sosial',
                'achievements' => 'Juara 1 Lomba Tandu Cepat & Perawatan Keluarga PMI Jawa Barat',
            ],
            [
                'name' => 'Karya Ilmiah Remaja (KIR) & Robotik',
                'category' => 'Akademik',
                'description' => 'Mengembangkan budaya riset sains terapan, penulisan esai ilmiah, eksperimen mikrobiologi, coding microcontroller Arduino/ESP32, dan automasi.',
                'coach_name' => 'Ir. Budi Santoso, M.T. & Fitri Astuti, M.Si.',
                'schedule' => 'Senin & Sabtu, 14.00 - 16.30 WIB',
                'location' => 'Laboratorium Komputer & Sains Terpadu',
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Prestasi',
                'achievements' => 'Finalis Lomba Peneliti Belia Nasional (LPB), Medali Emas Line Follower Robot Contest',
            ],
            [
                'name' => 'Bola Basket (Harapan Bangsa Knights)',
                'category' => 'Olahraga',
                'description' => 'Pembinaan bakat bola basket intensif dengan kurikulum fundamental dribble, passing, defense play, dan strategi tanding kejuaraan.',
                'coach_name' => 'Coach Aris Munandar (Lisensi B Perbasi)',
                'schedule' => 'Senin & Kamis, 16.00 - 18.00 WIB',
                'location' => 'Gelanggang Olahraga (GOR) Indoor',
                'image' => 'https://images.unsplash.com/photo-1546519638-68e109498ffc?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Populer',
                'achievements' => 'Runner-up DBL West Java Series, Juara 1 Turnamen Antar-Pelajar Piala Walikota',
            ],
            [
                'name' => 'Futsal & Sepak Bola',
                'category' => 'Olahraga',
                'description' => 'Membangun kebugaran fisik prima, kerja sama tim solid, teknik penguasaan bola, dan mentalitas sportif dalam kompetisi futsal pelajar.',
                'coach_name' => 'Coach Deden Iskandar, S.Pd.Or.',
                'schedule' => 'Rabu & Sabtu, 15.30 - 17.30 WIB',
                'location' => 'Lapangan Futsal Sekolah & Lapangan Rumput Sintetis',
                'image' => 'https://images.unsplash.com/photo-1574629810360-7efbbe195018?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Favorit',
                'achievements' => 'Juara 1 Liga Pelajar Futsal Championship 2025',
            ],
            [
                'name' => 'Paduan Suara & Orkestra (Symphonia)',
                'category' => 'Seni & Budaya',
                'description' => 'Eksplorasi olah vokal paduan suara harmoni empat suara (SATB), teknik pernapasan diafragma, dan pengenalan instrumen musik akustik.',
                'coach_name' => 'Yohanes Triyono, S.Sn.',
                'schedule' => 'Selasa & Jumat, 15.30 - 17.00 WIB',
                'location' => 'Ruang Seni Musik Akustik',
                'image' => 'https://images.unsplash.com/photo-1514320291840-2e0a9bf2a9ae?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Seni',
                'achievements' => 'Gold Medal Bandung Choral Competition Kategori High School Choir',
            ],
            [
                'name' => 'Tari Nusantara & Teater (Sekar Langit)',
                'category' => 'Seni & Budaya',
                'description' => 'Pelestarian ragam gerak tari tradisional nusantara seperti Jaipong, Saman, dan Tari Piring serta pembekalan seni peran teater.',
                'coach_name' => 'Nia Kurniasih, S.Pd. & Dewi Sekarwati, S.Sn.',
                'schedule' => 'Kamis & Sabtu, 15.00 - 17.00 WIB',
                'location' => 'Panggung Kesenian Terbuka',
                'image' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?auto=format&fit=crop&w=800&q=80',
                'badge' => 'Budaya',
                'achievements' => 'Penyaji Tari Tradisional Terbaik Festival Budaya Remaja Jawa Barat',
            ],
        ];

        foreach ($ekskulItems as $ekskul) {
            Extracurricular::create(array_merge($ekskul, [
                'slug' => Str::slug($ekskul['name']),
            ]));
        }

        // 4. Galeri Foto & Dokumentasi Kegiatan
        Gallery::truncate();
        $galleryItems = [
            [
                'title' => 'Upacara Peringatan Hari Pendidikan Nasional dan Apel Akbar',
                'category' => 'Upacara',
                'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=800&q=80',
                'description' => 'Seluruh dewan guru dan peserta didik mengenakan busana adat nusantara mengikuti upacara dengan penuh khidmat di lapangan utama.',
                'activity_date' => '2026-05-02',
            ],
            [
                'title' => 'Praktikum Uji DNA & Bioteknologi Siswa di Laboratorium Sains',
                'category' => 'Kegiatan Belajar',
                'image' => 'https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=800&q=80',
                'description' => 'Siswa kelas XII peminatan biologi melakukan ekstraksi DNA buah menggunakan perlengkapan sentrifugasi dan mikroskop elektron.',
                'activity_date' => '2026-04-18',
            ],
            [
                'title' => 'Penganugerahan Juara Umum Kompetisi Debat Bahasa Inggris & Riset',
                'category' => 'Prestasi Siswa',
                'image' => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=800&q=80',
                'description' => 'Momen kebanggaan penyerahan piala dan sertifikat penghargaan oleh Kepala Sekolah atas prestasi delegasi debat sekolah.',
                'activity_date' => '2026-06-10',
            ],
            [
                'title' => 'Gelar Festival Seni Pertunjukan Tari Kolosal Tradisi Sunda',
                'category' => 'Pentas Seni',
                'image' => 'https://images.unsplash.com/photo-1460723237483-7a6dc9d0b212?auto=format&fit=crop&w=800&q=80',
                'description' => 'Penampilan spektakuler 60 penari siswa SMAN 1 Harapan Bangsa memukau ribuan penonton di panggung kesenian utama.',
                'activity_date' => '2026-06-22',
            ],
            [
                'title' => 'Fasilitas Smart Library & Area Membaca Digital Modern',
                'category' => 'Fasilitas',
                'image' => 'https://images.unsplash.com/photo-1521587760476-6c12a4b040da?auto=format&fit=crop&w=800&q=80',
                'description' => 'Suasana nyaman ruang perpustakaan ber-AC dengan akses komputer riset terhubung jurnal nasional dan internasional.',
                'activity_date' => '2026-07-05',
            ],
            [
                'title' => 'Pertandingan Final Turnamen Bola Basket Antar Pelajar Se-Jabar',
                'category' => 'Kegiatan Belajar',
                'image' => 'https://images.unsplash.com/photo-1579952363873-27f3bade9f55?auto=format&fit=crop&w=800&q=80',
                'description' => 'Aksi lincah tim basket putra Harapan Bangsa Knights saat menembus pertahanan lawan di babak grand final.',
                'activity_date' => '2026-08-14',
            ],
            [
                'title' => 'Pelatihan Pertolongan Pertama PMR Wira Bersama PMI Cabang',
                'category' => 'Kegiatan Belajar',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80',
                'description' => 'Simulasi evakuasi korban bencana dan penanganan cedera darurat yang dipandu langsung oleh instruktur medis PMI.',
                'activity_date' => '2026-08-20',
            ],
            [
                'title' => 'Gedung Laboratorium Komputer Terpadu Berteknologi Gigabit',
                'category' => 'Fasilitas',
                'image' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80',
                'description' => 'Ruang lab komputer berkapasitas 80 unit PC Intel Core i7 yang digunakan untuk ANBK, coding, dan ujian online.',
                'activity_date' => '2026-09-01',
            ],
        ];

        foreach ($galleryItems as $gallery) {
            Gallery::create($gallery);
        }

        // 5. Pesan Kontak Contoh
        ContactMessage::truncate();
        ContactMessage::create([
            'name' => 'Dra. Endah Sulistyo',
            'email' => 'endah.sulistyo@gmail.com',
            'phone' => '081234567890',
            'subject' => 'Informasi Pelaksanaan Penerimaan Peserta Didik Baru (PPDB)',
            'message' => 'Selamat siang bapak/ibu panitia, mohon informasi mengenai syarat jalur prestasi akademik dan jadwal verifikasi berkas untuk tahun ajaran baru. Terima kasih.',
            'is_read' => true,
        ]);

        // 6. Akun Administrator CMS Sekolah
        User::truncate();
        User::create([
            'name' => 'Administrator CMS Sekolah',
            'email' => 'admin@sekolah.web.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
        User::create([
            'name' => 'Administrator Backup',
            'email' => 'admin@sekolah.sch.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
        ]);
    }
}
