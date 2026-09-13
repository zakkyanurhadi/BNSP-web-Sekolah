@extends('layouts.admin-section.master')
@section('title', 'Detail Berita')
@section('nav-title', 'Detail Berita')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Header Section -->
    <div class="space-y-1">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('admin') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Dashboard</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Berita</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-blue-700 font-semibold">Detail Berita</span>
        </nav>

        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Detail Berita</h2>
            <p class="text-sm text-slate-500 mt-1">Melihat rincian berita portal Panel CMS Konten Sekolah</p>
        </div>
    </div>

    <!-- News Content Card -->
    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200/70 shadow-sm space-y-6">
        <!-- News Header Info -->
        <div class="space-y-3 text-center max-w-3xl mx-auto">
            <div class="flex items-center justify-center gap-2">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-100">
                    {{ $beritas->kategori->nama_kategori ?? 'Umum' }}
                </span>
                <span class="text-xs text-slate-400 font-medium">
                    {{ date('j F Y, H:i', strtotime($beritas->created_at)) }} WIB
                </span>
            </div>
            <h1 class="text-2xl md:text-4xl font-extrabold text-slate-800 leading-tight">
                {{ $beritas->judul }}
            </h1>
        </div>

        <!-- Thumbnail Image -->
        <div class="max-w-2xl mx-auto">
            @if ($beritas->thumbnail)
                <img src="{{ asset('storage/' . $beritas->thumbnail) }}" alt="{{ $beritas->judul }}" class="w-full h-auto max-h-96 object-cover rounded-2xl border border-slate-200 shadow-sm">
            @else
                <img src="/images/banner.jpg" alt="{{ $beritas->judul }}" class="w-full h-auto max-h-96 object-cover rounded-2xl border border-slate-200 shadow-sm">
            @endif
        </div>

        <!-- Article Content -->
        <div class="max-w-3xl mx-auto text-justify text-slate-700 leading-relaxed whitespace-pre-wrap font-normal text-base border-t border-slate-100 pt-6">
            {{ $beritas->deskripsi }}
        </div>

        <!-- Footer Back Action -->
        <div class="max-w-3xl mx-auto pt-6 border-t border-slate-100 flex items-center justify-end">
            <a href="{{ route('berita') }}" 
               class="inline-flex items-center gap-2 px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-700 text-sm font-semibold rounded-xl transition-colors border border-slate-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                <span>Kembali</span>
            </a>
        </div>
    </div>
</div>
@endsection


