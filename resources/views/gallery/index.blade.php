@extends('layouts.app')

@section('title', 'Galeri Dokumentasi - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 56px 0;">
    <div class="container" style="text-align: center;">
        <span class="hero-tag" style="margin-bottom: 12px;">DOKUMENTASI MULTIMEDIA</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 12px;">Galeri Kegiatan Sekolah</h1>
        <p style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 1.0625rem;">
            Dokumentasi visual rangkaian aktivitas pembelajaran, kejuaraan, peringatan hari besar, dan sarana prasarana sekolah.
        </p>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-bar">
            <a href="{{ route('gallery.index') }}" 
               class="filter-btn {{ !request('kategori') || request('kategori') === 'Semua' ? 'active' : '' }}">
                Semua Koleksi ({{ $galleries->count() }})
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('gallery.index', ['kategori' => $cat]) }}" 
                   class="filter-btn {{ request('kategori') === $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Gallery Grid with Lightbox Data -->
        <div class="gallery-grid">
            @forelse($galleries as $item)
                <div class="gallery-card" 
                     data-img="{{ asset($item->image) }}" 
                     data-title="{{ $item->title }}" 
                     data-desc="{{ $item->description }} — Tanggal Pelaksanaan: {{ $item->activity_date->format('d F Y') }}">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy">
                    <div class="gallery-overlay">
                        <span class="gallery-badge">{{ $item->category }}</span>
                        <h3 class="gallery-title">{{ $item->title }}</h3>
                        <span class="gallery-date">
                            <svg style="display:inline; width:12px; height:12px; vertical-align:middle; margin-right:4px;" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $item->activity_date->format('d F Y') }}
                        </span>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-muted); padding: 40px 0;">
                    Belum ada dokumentasi pada kategori yang dipilih.
                </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
