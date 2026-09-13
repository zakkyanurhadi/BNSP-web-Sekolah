@extends('layouts.app')

@section('title', 'Berita & Kegiatan - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 56px 0;">
    <div class="container" style="text-align: center;">
        <span class="hero-tag" style="margin-bottom: 12px;">WARTA & INFORMASI</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 12px;">Kabar & Agenda Sekolah</h1>
        <p style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 1.0625rem;">
            Pusat publikasi berita resmi seputar kegiatan belajar mengajar, pengumuman kedinasan, dan torehan prestasi siswa.
        </p>

        <!-- Search Bar Form -->
        <form action="{{ route('news.index') }}" method="GET" style="max-width: 520px; margin: 28px auto 0; display: flex; gap: 8px;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari judul berita atau kegiatan..." class="form-control" style="border-radius: var(--radius-full); padding: 12px 20px;">
            <button type="submit" class="btn btn-primary" style="flex-shrink: 0; padding: 12px 24px;">
                Cari
            </button>
        </form>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-bar">
            <a href="{{ route('news.index') }}" 
               class="filter-btn {{ !request('kategori') || request('kategori') === 'Semua' ? 'active' : '' }}">
                Semua Topik
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('news.index', array_merge(request()->query(), ['kategori' => $cat])) }}" 
                   class="filter-btn {{ request('kategori') === $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        @if(request('search'))
            <div style="margin-bottom: 24px; color: var(--color-text-muted); font-size: 0.9375rem;">
                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                <a href="{{ route('news.index') }}" style="color: var(--color-accent); margin-left: 8px; text-decoration: underline;">(Reset Pencarian)</a>
            </div>
        @endif

        <!-- News Cards Grid -->
        <div class="news-grid">
            @forelse($newsList as $item)
                <article class="news-card">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="news-card-img" loading="lazy">
                    <div class="news-card-body">
                        <div class="news-meta">
                            <span class="category-badge {{ strtolower($item->category) }}">{{ $item->category }}</span>
                            <span>{{ $item->published_at->format('d M Y') }}</span>
                        </div>
                        <h2 class="news-card-title">
                            <a href="{{ route('news.show', $item->slug) }}">{{ $item->title }}</a>
                        </h2>
                        <p class="news-card-excerpt">
                            {{ Str::limit($item->excerpt, 120) }}
                        </p>
                        <div class="news-card-footer">
                            <span>Oleh {{ $item->author }}</span>
                            <a href="{{ route('news.show', $item->slug) }}" style="display:inline-flex;align-items:center;gap:6px;color:var(--color-primary-light);font-weight:600;">
                                <span>Baca Selengkapnya</span>
                                <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-muted); padding: 40px 0;">
                    Tidak ada artikel atau berita yang sesuai dengan kata kunci Anda.
                </p>
            @endforelse
        </div>

        <!-- Custom Clean Pagination Links -->
        <div style="margin-top: 48px; display: flex; justify-content: center;">
            {{ $newsList->links() }}
        </div>
    </div>
</div>
@endsection
