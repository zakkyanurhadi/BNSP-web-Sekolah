@extends('layouts.admin-section.master')
@section('title', 'Edit Berita')
@section('nav-title', 'Edit Berita')

@section('content')
<div x-data="{
    judul: `{{ old('judul', $beritas->judul) }}`,
    slug: '{{ old('slug', $beritas->slug) }}',
    thumbnailPreview: '{{ $beritas->thumbnail ? asset('storage/' . $beritas->thumbnail) : '' }}',
    isSubmitting: false,

    generateSlug() {
        if (!this.judul) return;
        fetch('{{ route('checkSlug') }}?judul=' + encodeURIComponent(this.judul))
            .then(res => res.json())
            .then(data => { this.slug = data.slug; });
    },

    previewFile(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => { this.thumbnailPreview = e.target.result; };
            reader.readAsDataURL(file);
        }
    }
}" class="space-y-6">

    <!-- Breadcrumb & Header Section -->
    <div class="space-y-1">
        <!-- Breadcrumb -->
        <nav class="flex items-center gap-2 text-sm text-slate-500">
            <a href="{{ route('admin') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Dashboard</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="{{ route('berita') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline transition-colors">Berita</a>
            <svg class="w-4 h-4 text-slate-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-blue-700 font-semibold">Edit Berita</span>
        </nav>

        <div>
            <h2 class="text-2xl font-bold text-slate-800 tracking-tight">Edit Berita</h2>
            <p class="text-sm text-slate-500 mt-1">Perbarui data berita existing</p>
        </div>
    </div>

    <!-- Form Card Container -->
    <div class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200/70 shadow-sm">
        <form action="{{ route('proses-edit-berita', $beritas->id) }}" 
              method="POST" 
              enctype="multipart/form-data"
              @submit="isSubmitting = true"
              class="space-y-6 max-w-4xl">
            @csrf
            @method('PUT')

            <!-- Grid 2 Kolom: Judul & Slug -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Judul Berita -->
                <div>
                    <label for="judul" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Judul Berita <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           x-model="judul"
                           @input="generateSlug()"
                           placeholder="Masukkan judul berita utama..." 
                           required
                           class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                    @error('judul')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug Berita -->
                <div>
                    <label for="slug" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Slug (URL Friendly) <span class="text-rose-500">*</span>
                    </label>
                    <input type="text" 
                           id="slug" 
                           name="slug" 
                           x-model="slug"
                           placeholder="slug-otomatis-berita" 
                           readonly
                           required
                           class="block w-full px-4 py-2.5 text-sm text-slate-500 bg-slate-100 border border-slate-200 rounded-xl cursor-not-allowed">
                    @error('slug')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Grid 3 Kolom: Kategori, Status Berita, Status Publish -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Kategori Berita -->
                <div>
                    <label for="kategori" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Kategori Berita <span class="text-rose-500">*</span>
                    </label>
                    <select name="kategori" 
                            required
                            class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}" {{ old('kategori', $beritas->kategori_id) == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Berita -->
                <div>
                    <label for="status_berita" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Status Berita <span class="text-rose-500">*</span>
                    </label>
                    <select name="status_berita" 
                            required
                            class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        <option value="regular" {{ old('status_berita', $beritas->status_berita) === 'regular' ? 'selected' : '' }}>Regular</option>
                        <option value="headline" {{ old('status_berita', $beritas->status_berita) === 'headline' ? 'selected' : '' }}>Headline</option>
                    </select>
                    @error('status_berita')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Publish -->
                <div>
                    <label for="status_publish" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                        Status Publish <span class="text-rose-500">*</span>
                    </label>
                    <select name="status_publish" 
                            required
                            class="block w-full px-4 py-2.5 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">
                        <option value="publish" {{ old('status_publish', $beritas->status_publish) === 'publish' ? 'selected' : '' }}>Publish</option>
                        <option value="draft" {{ old('status_publish', $beritas->status_publish) === 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                    @error('status_publish')
                        <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Thumbnail Gambar -->
            <div>
                <label for="thumbnail" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                    Thumbnail Gambar <span class="text-slate-400 font-normal">(Opsional jika tidak diubah)</span>
                </label>
                <input type="file" 
                       id="thumbnail"
                       name="thumbnail" 
                       @change="previewFile($event)"
                       accept="image/jpeg,image/png,image/jpg"
                       class="block w-full text-xs text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 cursor-pointer border border-slate-200 rounded-xl bg-slate-50">
                @error('thumbnail')
                    <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror

                <!-- Image Preview -->
                <template x-if="thumbnailPreview">
                    <div class="mt-4 relative w-48 h-32 rounded-2xl border border-slate-200 overflow-hidden bg-slate-100 shadow-sm">
                        <img :src="thumbnailPreview" alt="Preview Thumbnail" class="w-full h-full object-cover">
                    </div>
                </template>
            </div>

            <!-- Deskripsi Berita -->
            <div>
                <label for="deskripsi" class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">
                    Isi Konten Berita <span class="text-rose-500">*</span>
                </label>
                <textarea id="deskripsi"
                          name="deskripsi" 
                          rows="8" 
                          placeholder="Tuliskan lengkap konten berita di sini..." 
                          required
                          class="block w-full px-4 py-3 text-sm text-slate-800 bg-slate-50 border border-slate-200 rounded-xl focus:bg-white focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all">{{ old('deskripsi', $beritas->deskripsi) }}</textarea>
                @error('deskripsi')
                    <p class="text-xs text-rose-500 mt-1.5 font-medium">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons Footer -->
            <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
                <a href="{{ route('berita') }}" 
                   class="px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-100 rounded-xl transition-colors">
                    Batal
                </a>
                <button type="submit" 
                        :disabled="isSubmitting"
                        class="inline-flex items-center gap-2 px-6 py-2.5 bg-amber-500 hover:bg-amber-600 disabled:bg-amber-300 text-white text-sm font-semibold rounded-xl shadow-sm transition-all focus:ring-4 focus:ring-amber-100">
                    <svg x-show="isSubmitting" class="animate-spin w-4 h-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                    <span x-text="isSubmitting ? 'Menyimpan...' : 'Simpan Perubahan'"></span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

