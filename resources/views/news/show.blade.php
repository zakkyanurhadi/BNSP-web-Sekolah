@extends('layouts.app')

@section('title', $news->title . ' - ' . ($profile->name ?? 'SMA Negeri 1 Harapan Bangsa'))

@section('content')
<!-- Header Banner -->
<section style="background: linear-gradient(135deg, #07192f 0%, #0b2545 100%); color: #ffffff; padding: 48px 0;">
    <div class="container">
        <a href="{{ route('news.index') }}" style="display: inline-flex; align-items: center; gap: 8px; color: #94a3b8; font-size: 0.875rem; margin-bottom: 16px;">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
            Kembali ke Arsip Berita
        </a>
        <div style="display: flex; gap: 14px; align-items: center; margin-bottom: 12px; flex-wrap: wrap;">
            <span class="hero-tag" style="margin-bottom: 0;">{{ $news->category }}</span>
            <span style="color: #cbd5e1; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 5px;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $news->published_at->format('d F Y') }}
            </span>
            <span style="color: #cbd5e1; font-size: 0.875rem; display: inline-flex; align-items: center; gap: 5px;">
                <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                {{ $news->views }} kali dilihat
            </span>
        </div>
        <h1 style="font-size: 2.25rem; font-weight: 800; line-height: 1.25; max-width: 900px;">{{ $news->title }}</h1>
    </div>
</section>

<div class="section-padding">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 48px; align-items: start;">
            <!-- Article Body -->
            <div>
                <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" style="width: 100%; border-radius: var(--radius-lg); margin-bottom: 28px; box-shadow: var(--shadow-md);">
                
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 36px; box-shadow: var(--shadow-sm);">
                    <div style="border-bottom: 1px solid var(--border-color); padding-bottom: 16px; margin-bottom: 24px; font-size: 0.875rem; color: var(--color-text-muted);">
                        Ditulis oleh: <strong>{{ $news->author }}</strong> • Editor Publikasi Humas SMAN 1 Harapan Bangsa
                    </div>

                    <div style="font-size: 1.0625rem; line-height: 1.85; color: var(--color-text-main);">
                        {!! nl2br(e($news->content)) !!}
                    </div>

                    <div style="border-top: 1px solid var(--border-color); margin-top: 36px; padding-top: 20px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 12px;">
                        <span style="font-size: 0.875rem; color: var(--color-text-muted);">Bagikan artikel ini ke media sosial:</span>
                        <div style="display: flex; gap: 8px;">
                            <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' ' . url()->current()) }}" target="_blank" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8125rem;">
                                WhatsApp
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($news->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" class="btn btn-outline" style="padding: 6px 14px; font-size: 0.8125rem;">
                                X / Twitter
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div style="background: var(--color-surface); border: 1px solid var(--border-color); border-radius: var(--radius-lg); padding: 28px; box-shadow: var(--shadow-sm);">
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: var(--color-primary); margin-bottom: 20px; border-bottom: 2px solid var(--border-color); padding-bottom: 10px;">
                        Berita Terkini Lainnya
                    </h3>
                    
                    <div style="display: flex; flex-direction: column; gap: 18px;">
                        @foreach($recentNews as $recent)
                            <article style="display: flex; gap: 14px; align-items: center;">
                                <img src="{{ asset($recent->image) }}" alt="{{ $recent->title }}" style="width: 80px; height: 60px; object-fit: cover; border-radius: var(--radius-sm); flex-shrink: 0;">
                                <div>
                                    <span style="font-size: 0.6875rem; color: var(--color-accent); font-weight: 700;">{{ $recent->category }}</span>
                                    <h4 style="font-size: 0.875rem; font-weight: 600; line-height: 1.35; margin-top: 2px;">
                                        <a href="{{ route('news.show', $recent->slug) }}" style="color: var(--color-text-main);">
                                            {{ Str::limit($recent->title, 55) }}
                                        </a>
                                    </h4>
                                    <span style="font-size: 0.6875rem; color: var(--color-text-muted);">{{ $recent->published_at->format('d M Y') }}</span>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div style="margin-top: 28px; padding-top: 20px; border-top: 1px solid var(--border-color); text-align: center;">
                        <a href="{{ route('news.index') }}" class="btn btn-outline" style="width: 100%; font-size: 0.875rem;">
                            <span>Buka Seluruh Berita</span>
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="margin-left: 6px;"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
