@extends('layouts.admin-section.master')
@section('title', 'Kelola Kategori')
@section('nav-title', 'Kategori')

@section('content')
<div class="space-y-6">
    <!-- Breadcrumb & Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="space-y-1">
            <!-- Breadcrumb -->
            <nav class="flex items-center gap-2 text-sm text-slate-500">
                <a href="{{ route('admin') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Dashboard</a>
                <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                <span class="text-blue-700 font-semibold">Kategori</span>
            </nav>

            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Kategori</h2>
            <p class="text-sm text-slate-500">Kelola kategori berita portal Panel CMS Konten Sekolah</p>
        </div>
        <a href="{{ route('tambah-kategori') }}" 
           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-xl shadow-sm transition-all focus:ring-4 focus:ring-blue-100">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            <span>Tambah Kategori</span>
        </a>
    </div>

    <!-- Search Card -->
    <div class="bg-white p-4 rounded-2xl border border-slate-200/70 shadow-sm">
        <form action="{{ route('kategori') }}" method="GET" class="flex items-center">
            <div class="relative w-full sm:w-96">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}"
                       placeholder="Cari nama kategori..." 
                       class="block w-full pl-10 pr-4 py-2 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-2xl border border-slate-200/70 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-slate-600">
                <thead class="text-xs text-slate-400 font-semibold uppercase bg-slate-50 border-b border-slate-100">
                    <tr>
                        <th scope="col" class="px-6 py-3.5 w-16 text-center">No</th>
                        <th scope="col" class="px-6 py-3.5">Nama Kategori</th>
                        <th scope="col" class="px-6 py-3.5">Tanggal Dibuat</th>
                        <th scope="col" class="px-6 py-3.5 text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($kategoris as $index => $item)
                    <tr class="hover:bg-slate-50/80 transition-colors">
                        <td class="px-6 py-4 text-center font-medium text-slate-500">
                            {{ $kategoris->firstItem() + $index }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-slate-800">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xs border border-amber-100">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                </div>
                                <span>{{ $item->nama_kategori }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-xs text-slate-500">
                            {{ $item->created_at ? $item->created_at->format('d M Y, H:i') : '-' }}
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex items-center justify-center gap-1.5">
                                <!-- Edit Button -->
                                <a href="{{ route('edit-kategori', $item->id) }}" 
                                   title="Edit Kategori"
                                   class="p-2 text-slate-500 hover:text-amber-600 hover:bg-amber-50 rounded-xl transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>

                                <!-- Delete Button using SweetAlert2 -->
                                <button onclick="confirmDelete('{{ route('hapus-kategori', $item->id) }}', '{{ addslashes($item->nama_kategori) }}')" 
                                        type="button" 
                                        title="Hapus Kategori"
                                        class="p-2 text-slate-500 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="max-w-xs mx-auto text-center space-y-3">
                                <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center mx-auto">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-slate-700">Belum Ada Kategori</p>
                                    <p class="text-xs text-slate-400 mt-1">Belum ada kategori yang ditambahkan.</p>
                                </div>
                                <a href="{{ route('tambah-kategori') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-blue-50 text-blue-600 hover:bg-blue-100 text-xs font-semibold rounded-lg transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                    <span>Tambah Kategori Pertama</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($kategoris->hasPages())
        <div class="p-4 border-t border-slate-100 bg-slate-50/50">
            {{ $kategoris->links() }}
        </div>
        @endif
    </div>
</div>
@endsection


