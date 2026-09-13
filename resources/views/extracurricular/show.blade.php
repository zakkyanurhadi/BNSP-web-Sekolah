@extends('layouts.app')

@section('title', $ekskul->name . ' - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 48px 0;">
    <div class="container">
        <a href="{{ route('extracurricular.index') }}" style="display: inline-flex; align-items: center; gap: 8px; color: #94a3b8; font-size: 0.875rem; margin-bottom: 16px;">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Daftar Ekstrakurikuler
        </a>
        <span class="hero-tag" style="margin-bottom: 12px;">{{ $ekskul->category }}</span>
        <h1 style="font-size: 2.25rem; font-weight: 800; line-height: 1.25;">{{ $ekskul->name }}</h1>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1.8fr 1fr; gap: 40px; align-items: start;">
            <!-- Main Content -->
            <div>
                <img src="{{ asset($ekskul->image) }}" alt="{{ $ekskul->name }}" style="width: 100%; border-radius: var(--radius-lg); margin-bottom: 28px; box-shadow: var(--shadow-md);">
                
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 32px; box-shadow: var(--shadow-sm); margin-bottom: 32px;">
                    <h2 style="font-size: 1.35rem; font-weight: 700; color: var(--color-primary); margin-bottom: 16px;">
                        Tentang Ekstrakurikuler
                    </h2>
                    <p style="color: var(--color-text-main); font-size: 1rem; line-height: 1.8; margin-bottom: 24px;">
                        {{ $ekskul->description }}
                    </p>

                    @if($ekskul->achievements)
                        <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--color-primary); margin-bottom: 12px; display: flex; align-items: center; gap: 8px;">
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color: var(--color-accent); flex-shrink: 0;"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
                            Prestasi & Rekam Jejak
                        </h3>
                        <div style="background: #fffbeb; border: 1px solid #fef3c7; border-radius: var(--radius-md); padding: 16px; color: #92400e; font-size: 0.9375rem; line-height: 1.6;">
                            {{ $ekskul->achievements }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Sidebar Info -->
            <div>
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 28px; box-shadow: var(--shadow-sm); margin-bottom: 24px;">
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--color-primary); margin-bottom: 20px; border-bottom: 2px solid var(--border-color); padding-bottom: 10px;">
                        Informasi Kegiatan
                    </h3>
                    
                    <div style="margin-bottom: 16px;">
                        <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase;">Pembina / Pelatih</span>
                        <p style="font-size: 0.9375rem; font-weight: 700; color: var(--color-primary); margin-top: 2px;">{{ $ekskul->coach_name }}</p>
                    </div>

                    <div style="margin-bottom: 16px;">
                        <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase;">Jadwal Latihan Rutin</span>
                        <p style="font-size: 0.9375rem; font-weight: 700; color: var(--color-primary); margin-top: 2px;">{{ $ekskul->schedule }}</p>
                    </div>

                    <div style="margin-bottom: 20px;">
                        <span style="font-size: 0.75rem; font-weight: 600; color: var(--color-text-muted); text-transform: uppercase;">Lokasi Latihan</span>
                        <p style="font-size: 0.9375rem; font-weight: 700; color: var(--color-primary); margin-top: 2px;">{{ $ekskul->location }}</p>
                    </div>

                    <a href="{{ route('contact') }}" class="btn btn-primary" style="width: 100%; font-size: 0.875rem;">
                        Tanya Pendaftaran Ekskul
                    </a>
                </div>

                <!-- Ekskul Lainnya -->
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 24px;">
                    <h4 style="font-size: 1rem; font-weight: 700; color: var(--color-primary); margin-bottom: 14px;">
                        Ekstrakurikuler Lainnya
                    </h4>
                    <ul style="list-style: none;">
                        @foreach($otherEkskuls as $other)
                            <li style="margin-bottom: 12px; padding-bottom: 12px; border-bottom: 1px solid var(--border-color);">
                                <a href="{{ route('extracurricular.show', $other->slug) }}" style="display: flex; justify-content: space-between; align-items: center; color: var(--color-text-main); font-weight: 600; font-size: 0.875rem;">
                                    <span>{{ $other->name }}</span>
                                    <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color: var(--color-accent);"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
