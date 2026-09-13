@extends('layouts.app')

@section('title', 'Ekstrakurikuler - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 56px 0;">
    <div class="container" style="text-align: center;">
        <span class="hero-tag" style="margin-bottom: 12px;">PENGEMBANGAN DIRI</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; margin-bottom: 12px;">Ekstrakurikuler Siswa</h1>
        <p style="color: #cbd5e1; max-width: 650px; margin: 0 auto; font-size: 1.0625rem;">
            Ragam aktivitas pengembangan minat, bakat, kepemimpinan, seni, olahraga, dan riset keilmuan di {{ $profile->name }}.
        </p>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="filter-bar">
            <a href="{{ route('extracurricular.index') }}" 
               class="filter-btn {{ !request('kategori') || request('kategori') === 'Semua' ? 'active' : '' }}">
                Semua Kategori
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('extracurricular.index', ['kategori' => $cat]) }}" 
                   class="filter-btn {{ request('kategori') === $cat ? 'active' : '' }}">
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        <!-- Ekstrakurikuler Grid -->
        <div class="ekskul-grid">
            @forelse($ekskuls as $ekskul)
                <div class="ekskul-card">
                    <img src="{{ asset($ekskul->image) }}" alt="{{ $ekskul->name }}" class="ekskul-img" loading="lazy">
                    <div class="ekskul-body">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                            <span class="category-badge">{{ $ekskul->category }}</span>
                            @if($ekskul->badge)
                                <span style="font-size: 0.6875rem; font-weight: 700; color: var(--color-accent); background: var(--color-accent-soft); padding: 2px 8px; border-radius: var(--radius-full);">{{ $ekskul->badge }}</span>
                            @endif
                        </div>
                        <h3 class="ekskul-name">
                            <a href="{{ route('extracurricular.show', $ekskul->slug) }}" style="color: inherit;">
                                {{ $ekskul->name }}
                            </a>
                        </h3>
                        <p class="ekskul-desc">
                            {{ $ekskul->description }}
                        </p>
                        <div class="ekskul-schedule" style="margin-bottom: 8px;">
                            <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            <span>{{ $ekskul->schedule }}</span>
                        </div>
                        <div style="font-size: 0.75rem; color: var(--color-text-muted); margin-bottom: 16px;">
                            <strong>Pembina:</strong> {{ $ekskul->coach_name }}
                        </div>
                        <a href="{{ route('extracurricular.show', $ekskul->slug) }}" class="btn btn-outline" style="width: 100%; padding: 8px 14px; font-size: 0.8125rem;">
                            <span>Lihat Rincian Ekskul</span>
                            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="margin-left: 6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center; color: var(--color-text-muted); padding: 40px 0;">
                    Tidak ada ekstrakurikuler pada kategori ini.
                </p>
            @endforelse
        </div>
    </div>
</div>
@endsection
