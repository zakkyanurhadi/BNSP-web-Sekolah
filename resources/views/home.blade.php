@extends('layouts.app')

@section('title', 'Beranda - SMA Negeri 1 Harapan Bangsa')

@section('content')
<!-- 1. Zero Section: Swiper Hero Slider & Floating Card (Concept SMAN 9 Bandung) -->
<section class="zero-section-hero">
    <!-- Swiper Slider Container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1: SEMANGAT SPMB (Directly from User Reference) -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&w=1920&q=80');">
                    <div class="slide-overlay"></div>
                </div>
                <div class="container slide-content">
                    <div class="slide-badge">
                        <span class="pulse-dot"></span>
                        PENERIMAAN PESERTA DIDIK BARU 2026/2027
                    </div>
                    <h1 class="slide-title">SEMANGAT SPMB</h1>
                    <p class="slide-subtitle">
                        Selamat datang di portal resmi {{ $profile->name ?? 'SMA Negeri 1 Harapan Bangsa' }}. Mewujudkan generasi unggul, berakhlak mulia, dan siap bersaing di kancah nasional maupun global.
                    </p>
                    <div class="slide-actions">
                        <a href="{{ route('profile') }}" class="btn btn-primary">
                            Lihat Profil Sekolah
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('news.index') }}" class="btn btn-outline-light">
                            Warta & Pengumuman
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2: UNGGUL DALAM PRESTASI -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1920&q=80');">
                    <div class="slide-overlay"></div>
                </div>
                <div class="container slide-content">
                    <div class="slide-badge">
                        <span class="pulse-dot"></span>
                        AKREDITASI A (UNGGUL) BAN-S/M
                    </div>
                    <h1 class="slide-title">UNGGUL PRESTASI & KARAKTER</h1>
                    <p class="slide-subtitle">
                        Membimbing generasi cerdas berakhlak luhur dengan Kurikulum Merdeka, sains modern, serta fasilitas riset dan teknologi terdepan.
                    </p>
                    <div class="slide-actions">
                        <a href="{{ route('profile') }}#tabel-profil" class="btn btn-primary">
                            Tabel Identitas Resmi
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('extracurricular.index') }}" class="btn btn-outline-light">
                            Ekstrakurikuler Siswa
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3: FASILITAS & INOVASI PENDIDIKAN -->
            <div class="swiper-slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=1920&q=80');">
                    <div class="slide-overlay"></div>
                </div>
                <div class="container slide-content">
                    <div class="slide-badge">
                        <span class="pulse-dot"></span>
                        SMART CLASSROOM & DIGITAL SCHOOL
                    </div>
                    <h1 class="slide-title">KOLABORASI & INOVASI PENDIDIKAN</h1>
                    <p class="slide-subtitle">
                        Infrastruktur laboratorium komputer gigabit, perpustakaan pintar digital, dan lingkungan belajar kolaboratif berstandar prima.
                    </p>
                    <div class="slide-actions">
                        <a href="{{ route('gallery.index') }}" class="btn btn-primary">
                            Dokumentasi Galeri
                            <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="{{ route('contact') }}" class="btn btn-outline-light">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slider Controls: Circular Prev/Next Buttons (matching the user's reference) -->
        <div class="container swiper-controls-container">
            <div class="hero-slider-nav">
                <button type="button" class="hero-nav-btn hero-prev" aria-label="Slide Sebelumnya">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>
                <button type="button" class="hero-nav-btn hero-next" aria-label="Slide Selanjutnya">
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
            <!-- Pagination Bullets -->
            <div class="swiper-pagination hero-pagination"></div>
        </div>
    </div>
</section>

<!-- Floating Card: Sambutan Kepala Sekolah & Statistik Data Sekolah (Center-Aligned Split) -->
<div class="container hero-floating-container">
    <div class="hero-floating-card">
        <!-- Sisi Kiri: Sambutan Kepala Sekolah -->
        <div class="floating-sambutan">
            <div class="floating-sambutan-avatar-wrap">
                <img src="{{ $profile->principal_image ?? asset('images/kepala-sekolah.svg') }}" alt="{{ $profile->principal_name ?? 'Agus Hasan Sadzili, S.Pd' }}" class="floating-sambutan-avatar">
            </div>
            <div class="floating-sambutan-info">
                <h3 class="floating-card-title">Sambutan Kepala Sekolah</h3>
                <h4 class="floating-sambutan-name">{{ $profile->principal_name ?? 'Agus Hasan Sadzili, S.Pd' }}</h4>
                <p class="floating-sambutan-quote">
                    Bismillahirohmannirrohim Assalamu'alaikum Warahmatullahi Wabarakatuh. Alhamdulillahirobbil alamin kami panjatkan kehadirat Allah SWT, bahwasannya dengan rahmat dan karunia-Nya lah akhirnya Website sekolah ini resmi diluncurkan.
                </p>
                <a href="{{ route('profile') }}" class="btn-selengkapnya-pill">
                    <span>Selengkapnya</span>
                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
            </div>
        </div>

        <!-- Divider Line -->
        <div class="floating-card-divider"></div>

        <!-- Sisi Kanan: Statistik Data Sekolah -->
        <div class="floating-stats">
            <h3 class="floating-card-title">Statistik Data Sekolah</h3>
            <div class="floating-stats-row">
                <div class="floating-stat-item">
                    <div class="stat-number">{{ ($profile->teacher_count ?? 58) + ($profile->staff_count ?? 17) }}</div>
                    <div class="stat-name">GURU & STAF</div>
                </div>
                <div class="floating-stat-divider"></div>
                <div class="floating-stat-item">
                    <div class="stat-number">{{ $profile->student_count ?? 1238 }}</div>
                    <div class="stat-name">SISWA</div>
                </div>
                <div class="floating-stat-divider"></div>
                <div class="floating-stat-item">
                    <div class="stat-number">{{ $profile->classroom_count ?? 33 }}</div>
                    <div class="stat-name">ROMBEL</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- 4. Berita & Kegiatan Sekolah Terbaru (Poin 3 project.md) -->
<section class="section-padding home-news-section" style="background-color: var(--color-surface);">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">WARTA SEKOLAH</span>
            <h2 class="section-title">Berita & Kegiatan Terbaru</h2>
            <p class="section-subtitle">
                Ikuti liputan kegiatan belajar, prestasi akademik, perlombaan, dan agenda penting terkini dari lingkungan {{ $profile->name }}.
            </p>
        </div>

        <div class="news-grid">
            @forelse($latestNews as $news)
                <article class="news-card">
                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="news-card-img" loading="lazy">
                    <div class="news-card-body">
                        <div class="news-meta">
                            <span class="category-badge {{ strtolower($news->category) }}">{{ $news->category }}</span>
                            <span>{{ $news->published_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="news-card-title">
                            <a href="{{ route('news.show', $news->slug) }}">{{ $news->title }}</a>
                        </h3>
                        <p class="news-card-excerpt">
                            {{ Str::limit($news->excerpt, 120) }}
                        </p>
                        <div class="news-card-footer">
                            <span>Oleh {{ $news->author }}</span>
                            <a href="{{ route('news.show', $news->slug) }}" style="display:inline-flex;align-items:center;gap:6px;color:var(--color-primary-light);font-weight:600;">
                                <span>Selengkapnya</span>
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-muted);">Belum ada berita kegiatan yang dipublikasikan.</p>
            @endforelse
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('news.index') }}" class="btn btn-outline">
                Lihat Semua Arsip Berita
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 5. Galeri Dokumentasi Kegiatan (Poin 3 project.md) -->
<section class="section-padding">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">DOKUMENTASI VISUAL</span>
            <h2 class="section-title">Galeri Kegiatan Sekolah</h2>
            <p class="section-subtitle">
                Potret dinamika kehidupan belajar, kreativitas siswa, dan suasana kekeluargaan di SMAN 1 Harapan Bangsa.
            </p>
        </div>

        <div class="gallery-grid">
            @forelse($latestGalleries as $gallery)
                <div class="gallery-card" 
                     data-img="{{ asset($gallery->image) }}" 
                     data-title="{{ $gallery->title }}" 
                     data-desc="{{ $gallery->description }} (Tanggal: {{ $gallery->activity_date->format('d F Y') }})">
                    <img src="{{ asset($gallery->image) }}" alt="{{ $gallery->title }}" loading="lazy">
                    <div class="gallery-overlay">
                        <span class="gallery-badge">{{ $gallery->category }}</span>
                        <h4 class="gallery-title">{{ $gallery->title }}</h4>
                        <span class="gallery-date">{{ $gallery->activity_date->format('d M Y') }}</span>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-muted);">Belum ada dokumentasi galeri.</p>
            @endforelse
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('gallery.index') }}" class="btn btn-primary">
                Buka Galeri Multimedia Lengkap
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 6. Ekstrakurikuler Pilihan -->
<section class="section-padding" style="background-color: var(--color-surface-alt);">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">PENGEMBANGAN MINAT & BAKAT</span>
            <h2 class="section-title">Ekstrakurikuler Unggulan</h2>
            <p class="section-subtitle">
                Wadah penyaluran bakat, kepemimpinan, dan sportivitas siswa di luar jam akademik formal.
            </p>
        </div>

        <div class="ekskul-grid">
            @foreach($featuredEkskul as $ekskul)
                <div class="ekskul-card">
                    <img src="{{ asset($ekskul->image) }}" alt="{{ $ekskul->name }}" class="ekskul-img" loading="lazy">
                    <div class="ekskul-body">
                        <span class="category-badge" style="margin-bottom: 8px; align-self: flex-start;">{{ $ekskul->category }}</span>
                        <h4 class="ekskul-name">{{ $ekskul->name }}</h4>
                        <p class="ekskul-desc">{{ Str::limit($ekskul->description, 90) }}</p>
                        <div class="ekskul-schedule">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $ekskul->schedule }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 24px;">
            <a href="{{ route('extracurricular.index') }}" class="btn btn-outline">
                Jelajahi Seluruh Ekstrakurikuler ({{ $profile->extracurricular_count ?? '12+' }})
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>
    </div>
</section>
@endsection

