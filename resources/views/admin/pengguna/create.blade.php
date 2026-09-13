@extends('layouts.admin-section.master')
@section('title', 'Tambah Pengguna')
@section('nav-title', 'Tambah Pengguna')

@section('content')
<div x-data="{ isSubmitting: false }" class="space-y-6">
    <!-- Breadcrumb & Header Section -->
    <div class="space-y-1">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('admin') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Dashboard</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('pengguna') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Pengguna</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-blue-700 font-semibold">Tambah Pengguna</span>
        </nav>

        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Tambah Pengguna</h2>
            <p class="text-sm text-slate-500 mt-1">Buat akun pengguna sistem baru untuk Panel CMS Konten Sekolah</p>
        </div>
    </div>

    <!-- Form Card Container -->
    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200/70 shadow-sm max-w-2xl">
        <form action="{{ route('proses-tambah-pengguna') }}" 
              method="POST" 
              @submit="isSubmitting = true"
              class="space-y-6">
            @csrf

            <!-- Grid 2 Kolom: Nama & Email -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Nama -->
                <div>
                    <label for="nama" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Nama Lengkap <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           value="{{ old('nama') }}"
                           placeholder="John Doe" 
                           required
                           class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    @error('nama')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Alamat Email <span class="text-rose-500">*</span>
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}"
                           placeholder="user@indoberita.com" 
                           required
                           class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    @error('email')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Grid 2 Kolom: Role & Password -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <!-- Role -->
                <div>
                    <label for="role" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Role / Hak Akses <span class="text-rose-500">*</span>
                    </label>
                    <select name="role" 
                            required
                            class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        <option value="pengguna" {{ old('role') === 'pengguna' ? 'selected' : '' }}>Pengguna</option>
                        <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Password <span class="text-rose-500">*</span>
                    </label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="••••••••" 
                           required
                           class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    @error('password')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('pengguna') }}" 
                   class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        :disabled="isSubmitting"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white text-sm font-semibold rounded-xl shadow-sm transition-all focus:ring-4 focus:ring-blue-100">
                    <svg x-show="isSubmitting" class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan Pengguna'"></span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

