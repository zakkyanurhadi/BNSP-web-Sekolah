@extends('layouts.admin-section.master')
@section('title', 'Tambah Kategori')
@section('nav-title', 'Tambah Kategori')

@section('content')
<div x-data="{ isSubmitting: false }" class="space-y-6">
    <!-- Breadcrumb & Header Section -->
    <div class="space-y-1">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('admin') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Dashboard</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('kategori') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Kategori</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-blue-700 font-semibold">Tambah Kategori</span>
        </nav>

        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Tambah Kategori</h2>
            <p class="text-sm text-slate-500 mt-1">Buat kategori berita baru untuk portal Panel CMS Konten Sekolah</p>
        </div>
    </div>

    <!-- Form Card Container -->
    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200/70 shadow-sm max-w-xl">
        <form action="{{ route('proses-tambah-kategori') }}" 
              method="POST" 
              @submit="isSubmitting = true"
              class="space-y-6">
            @csrf

            <!-- Nama Kategori -->
            <div>
                <label for="nama_kategori" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                    Nama Kategori <span class="text-rose-500">*</span>
                </label>
                <input type="text" 
                       id="nama_kategori" 
                       name="nama_kategori" 
                       value="{{ old('nama_kategori') }}"
                       placeholder="Contoh: Kesehatan, Politik, Teknologi..." 
                       required
                       class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                @error('nama_kategori')
                    <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Footer Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('kategori') }}" 
                   class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        :disabled="isSubmitting"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white text-sm font-semibold rounded-xl shadow-sm transition-all focus:ring-4 focus:ring-blue-100">
                    <svg x-show="isSubmitting" class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan Kategori'"></span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

