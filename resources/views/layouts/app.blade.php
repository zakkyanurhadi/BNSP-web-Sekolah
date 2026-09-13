<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'SMA Negeri 1 Harapan Bangsa') - Sekolah Berkarakter & Berprestasi</title>
    <meta name="description" content="@yield('meta_description', 'Portal Resmi SMA Negeri 1 Harapan Bangsa. Mewujudkan generasi cendekia yang berakhlak mulia, berprestasi global, dan berwawasan lingkungan.')">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Custom Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Leaflet Maps CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-sekolah.svg') }}">
</head>
<body>

    <!-- Top Navigation Progress Loader Bar -->
    <div id="page-progress-bar" class="page-progress-bar" aria-hidden="true">
        <div class="progress-bar-glow"></div>
    </div>

    <!-- 1. Top Bar -->
    <div class="topbar">
        <div class="container topbar-content">
            <div class="topbar-info">
                <span class="topbar-item">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    (022) 7208945
                </span>
                <span class="topbar-item">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                    info@sman1harapanbangsa.sch.id
                </span>
                <span class="topbar-item">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Senin - Jumat: 07.00 - 16.00 WIB
                </span>
            </div>
            <div>
                <span class="topbar-badge">Akreditasi A (Unggul) • NPSN: 20108921</span>
            </div>
        </div>
    </div>

    <!-- 2. Main Navigation Bar -->
    <header class="navbar">
        <div class="container navbar-container">
            <a href="{{ route('home') }}" class="brand">
                <img src="{{ asset('images/logo-sekolah.svg') }}" alt="Logo SMAN 1 Harapan Bangsa" class="brand-logo">
                <div class="brand-text">
                    <h1>SMAN 1 HARAPAN BANGSA</h1>
                    <span>Unggul dalam Prestasi, Berkarakter Luhur</span>
                </div>
            </a>

            <!-- Nav Links -->
            <nav class="navbar-nav-wrap">
                <ul class="nav-menu">
                    <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
                    <li><a href="{{ route('profile') }}" class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('extracurricular.index') }}" class="nav-link {{ request()->routeIs('extracurricular.*') ? 'active' : '' }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('gallery.index') }}" class="nav-link {{ request()->routeIs('gallery.index') ? 'active' : '' }}">Galeri</a></li>
                    <li><a href="{{ route('news.index') }}" class="nav-link {{ request()->routeIs('news.*') ? 'active' : '' }}">Berita</a></li>
                    <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
                    <li><a href="{{ route('profile') }}#tabel-profil" class="nav-link nav-cta">Data Sekolah</a></li>
                </ul>
            </nav>

            <!-- Mobile Hamburger Toggle (Right-Aligned) -->
            <button type="button" class="mobile-toggle" aria-label="Toggle Menu">
                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </header>

    <!-- 3. Global Flash Notification -->
    @if(session('success'))
        <div class="container" style="margin-top: 20px;">
            <div class="alert alert-success">
                <span>{{ session('success') }}</span>
                <button type="button" onclick="this.parentElement.remove()" aria-label="Tutup Notifikasi" style="background:none;border:none;cursor:pointer;display:inline-flex;align-items:center;color:inherit;opacity:0.8;padding:4px;">
                    <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>
    @endif

    <!-- 4. Dynamic Content Body with Smooth Page Entrance -->
    <main id="main-content" class="page-main">
        @yield('content')
    </main>

    <!-- 5. Reusable Lightbox Modal for Gallery -->
    <div id="galleryModal" class="modal" role="dialog" aria-modal="true">
        <div class="modal-content">
            <button id="modalClose" class="modal-close" aria-label="Tutup Modal">
                <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <img id="modalImage" src="" alt="Pratinjau Galeri" class="modal-img">
            <div class="modal-body">
                <h3 id="modalTitle" class="modal-title"></h3>
                <p id="modalDesc" class="modal-desc"></p>
            </div>
        </div>
    </div>

    <!-- 6. Footer -->
    <footer class="footer">
        <div class="container footer-grid">
            <div>
                <div class="footer-brand">
                    <img src="{{ asset('images/logo-sekolah.svg') }}" alt="Logo">
                    <h3>SMAN 1 HARAPAN BANGSA</h3>
                </div>
                <p class="footer-desc">
                    Mewujudkan insan cendekia yang berakhlak mulia, berprestasi global, menguasai sains & teknologi, serta berwawasan lingkungan hidup.
                </p>
                <p style="font-size: 0.8125rem; color: #94a3b8;">
                    <strong>NPSN:</strong> 20108921 | <strong>Akreditasi:</strong> A (Unggul)
                </p>
            </div>

            <div>
                <h4 class="footer-title">Navigasi Cepat</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda Utama</a></li>
                    <li><a href="{{ route('profile') }}">Profil & Visi Misi</a></li>
                    <li><a href="{{ route('profile') }}#tabel-profil">Tabel Informasi Sekolah</a></li>
                    <li><a href="{{ route('extracurricular.index') }}">Program Ekstrakurikuler</a></li>
                    <li><a href="{{ route('gallery.index') }}">Galeri Dokumentasi</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">Informasi Publik</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('news.index') }}">Berita & Kegiatan</a></li>
                    <li><a href="{{ route('news.index', ['kategori' => 'Prestasi']) }}">Prestasi Siswa</a></li>
                    <li><a href="{{ route('news.index', ['kategori' => 'Akademik']) }}">Informasi Akademik</a></li>
                    <li><a href="{{ route('contact') }}">Layanan Aspirasi & Kontak</a></li>
                </ul>
            </div>

            <div>
                <h4 class="footer-title">Kontak & Alamat</h4>
                <p style="font-size: 0.875rem; color: #94a3b8; line-height: 1.6; margin-bottom: 10px;">
                    Jl. Pendidikan No. 45, Kompleks Cendekia, Sukamaju, Cibeunying Kidul, Kota Bandung, Jawa Barat 40123
                </p>
                <p style="font-size: 0.875rem; color: #cbd5e1; margin-bottom: 4px;">
                    <strong>Telepon:</strong> (022) 7208945
                </p>
                <p style="font-size: 0.875rem; color: #cbd5e1; margin-bottom: 12px;">
                    <strong>Email:</strong> info@sman1harapanbangsa.sch.id
                </p>

                <!-- Peta Google Maps Kecil Kanan di Footer -->
                <div class="footer-map-box" style="border-radius: 10px; overflow: hidden; border: 1px solid rgba(255, 255, 255, 0.18); box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);">
                    <iframe 
                        title="Peta Lokasi Google Maps SMAN 1 Harapan Bangsa"
                        src="https://maps.google.com/maps?q=SMA+Negeri+1+Harapan+Bangsa+Jl.+Pendidikan+No.+45+Bandung&t=&z=14&ie=UTF8&iwloc=&output=embed" 
                        width="100%" 
                        height="125" 
                        style="border:0; display: block;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="container footer-bottom">
            <p>&copy; {{ date('Y') }} SMA Negeri 1 Harapan Bangsa. Seluruh Hak Cipta Dilindungi. Sesuai Standar LSP Web Developer.</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <!-- Leaflet Maps JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
