@extends('layouts.admin-section.master')
@section('title', 'Dasbor Manajemen Konten Sekolah')
@section('nav-title', 'Dasbor')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div class="space-y-1">
            <nav class="flex items-center gap-2 text-xs font-semibold text-slate-500">
                <span class="text-blue-700">Panel CMS</span>
                <span class="text-slate-300">/</span>
                <span class="text-slate-600">Manajemen Konten Sekolah</span>
            </nav>

            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Dasbor Panel CMS</h1>
            <p class="text-xs sm:text-sm text-slate-500">
                Pusat kendali informasi, warta kegiatan, dokumentasi galeri, dan data pokok {{ $profile->name ?? 'SMA Negeri 1 Harapan Bangsa' }}
            </p>
        </div>

        <div class="flex items-center gap-2.5">
            <a href="{{ url('/') }}" target="_blank" 
               class="inline-flex items-center gap-2 px-4 py-2 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 text-xs font-bold rounded-xl shadow-xs transition-all">
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>Lihat Website</span>
            </a>
            <span class="inline-flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-700 border border-blue-100 text-xs font-semibold rounded-xl">
                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                <span>Role: Admin</span>
            </span>
        </div>
    </div>

    <!-- 4 Statistic Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
        <!-- Card 1: Total Berita -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Berita & Kegiatan</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1.5">{{ $totalBerita }}</h3>
                    <p class="text-[11px] text-emerald-600 font-semibold mt-1">{{ $beritaCount }} Terpublikasi</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center border border-blue-100 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 2: Galeri Multimedia -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Galeri Foto</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1.5">{{ $totalGaleri }}</h3>
                    <p class="text-[11px] text-blue-600 font-semibold mt-1">Dokumentasi Sekolah</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-700 flex items-center justify-center border border-emerald-100 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 3: Ekstrakurikuler -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Ekstrakurikuler</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1.5">{{ $totalEkskul }}</h3>
                    <p class="text-[11px] text-amber-600 font-semibold mt-1">Ekskul Aktif</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 flex items-center justify-center border border-amber-100 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 00-1-1H4a2 2 0 110-4h1a1 1 0 001-1V7a1 1 0 011-1h3a1 1 0 001-1V4z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Card 4: Pesan Masuk / Aspirasi -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-xs hover:shadow-md transition-all">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Pesan Masuk</p>
                    <h3 class="text-2xl font-black text-slate-900 mt-1.5">{{ $totalPesan }}</h3>
                    <p class="text-[11px] text-rose-600 font-semibold mt-1">{{ $pesanUnread }} Perlu Ditanggapi</p>
                </div>
                <div class="w-12 h-12 rounded-2xl bg-rose-50 text-rose-700 flex items-center justify-center border border-rose-100 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Profil & Data Pokok Sekolah (Card Grid) -->
    <div class="bg-white p-6 rounded-3xl border border-slate-200/80 shadow-xs">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between pb-4 border-b border-slate-100 gap-2">
            <div>
                <h3 class="text-base font-bold text-slate-900">Ringkasan Data Pokok Sekolah</h3>
                <p class="text-xs text-slate-500">Parameter legalitas terdaftar pada basis data relasional MySQL</p>
            </div>
            <a href="{{ route('profile') }}" target="_blank" class="text-xs font-bold text-blue-700 hover:text-blue-800 inline-flex items-center gap-1">
                <span>Buka Profil Publik</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 pt-5">
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">NPSN</span>
                <span class="text-sm font-extrabold text-slate-800">{{ $profile->npsn ?? '20108921' }}</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Akreditasi</span>
                <span class="text-sm font-extrabold text-emerald-700">{{ $profile->accreditation ?? 'A (Unggul)' }}</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Kepala Sekolah</span>
                <span class="text-sm font-extrabold text-slate-800 truncate block" title="{{ $profile->principal_name }}">{{ $profile->principal_name ?? 'Agus Hasan Sadzili, S.Pd' }}</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Peserta Didik</span>
                <span class="text-sm font-extrabold text-blue-700">{{ $profile->student_count ?? 1238 }} Siswa</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Pendidik & Staf</span>
                <span class="text-sm font-extrabold text-slate-800">{{ ($profile->teacher_count ?? 58) + ($profile->staff_count ?? 17) }} Orang</span>
            </div>
            <div class="p-3.5 rounded-2xl bg-slate-50 border border-slate-100">
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Rombel</span>
                <span class="text-sm font-extrabold text-slate-800">{{ $profile->classroom_count ?? 33 }} Kelas</span>
            </div>
        </div>
    </div>

    <!-- Dual Content Grid: Berita Terbaru & Pesan Masuk Terbaru -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Section 1: Berita Terbaru Sekolah -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-900">Warta & Kegiatan Terbaru</h3>
                    <p class="text-xs text-slate-500">Artikel yang tampil pada portal publik</p>
                </div>
                <a href="{{ route('news.index') }}" target="_blank" class="text-xs font-bold text-blue-700 hover:text-blue-800">
                    Lihat Arsip
                </a>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($beritaTerbaru as $item)
                <div class="p-4 flex items-center gap-3.5 hover:bg-slate-50/70 transition-colors">
                    <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-12 h-12 rounded-xl object-cover border border-slate-200 flex-shrink-0">
                    <div class="min-w-0 flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 rounded-md text-[10px] font-bold bg-blue-50 text-blue-700 border border-blue-100">
                                {{ $item->category }}
                            </span>
                            <span class="text-[11px] text-slate-400">
                                {{ $item->published_at ? $item->published_at->format('d M Y') : '-' }}
                            </span>
                        </div>
                        <h4 class="text-xs sm:text-sm font-semibold text-slate-800 truncate">
                            {{ $item->title }}
                        </h4>
                    </div>
                </div>
                @empty
                <div class="p-6 text-center text-xs text-slate-400">
                    Belum ada data berita.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Section 2: Pesan Aspirasi Masuk Terbaru -->
        <div class="bg-white rounded-3xl border border-slate-200/80 shadow-xs overflow-hidden">
            <div class="p-5 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <h3 class="text-sm sm:text-base font-bold text-slate-900">Pesan Aspirasi Kontak</h3>
                    <p class="text-xs text-slate-500">Kiriman dari masyarakat & calon siswa</p>
                </div>
                <span class="text-xs font-bold text-slate-400">
                    {{ $totalPesan }} Pesan Total
                </span>
            </div>

            <div class="divide-y divide-slate-100">
                @forelse($pesanTerbaru as $pesan)
                <div class="p-4 hover:bg-slate-50/70 transition-colors">
                    <div class="flex items-center justify-between gap-2 mb-1">
                        <span class="font-bold text-xs text-slate-800 truncate">{{ $pesan->name }}</span>
                        <span class="text-[11px] text-slate-400 flex-shrink-0">{{ $pesan->created_at ? $pesan->created_at->diffForHumans() : '-' }}</span>
                    </div>
                    <p class="text-xs font-semibold text-blue-700 truncate">{{ $pesan->subject }}</p>
                    <p class="text-[11.5px] text-slate-500 line-clamp-1 mt-0.5">{{ $pesan->message }}</p>
                </div>
                @empty
                <div class="p-6 text-center text-xs text-slate-400">
                    Belum ada pesan masuk.
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
