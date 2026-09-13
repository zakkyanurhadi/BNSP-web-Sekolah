<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AdminBeritaController extends Controller
{
    /**
     * Tampilkan daftar berita dengan pencarian dan filter
     */
    public function index(Request $request): View
    {
        $query = News::latest();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori_id') && $request->input('kategori_id') !== '') {
            $query->where('category', $request->input('kategori_id'));
        }

        $beritas = $query->paginate(10)->withQueryString();

        // Kategori list untuk dropdown filter
        $kategoris = collect([
            (object)['id' => 'Prestasi', 'nama_kategori' => 'Prestasi'],
            (object)['id' => 'Pengumuman', 'nama_kategori' => 'Pengumuman'],
            (object)['id' => 'Kegiatan', 'nama_kategori' => 'Kegiatan Siswa'],
            (object)['id' => 'Kurikulum', 'nama_kategori' => 'Kurikulum & Akademik'],
        ]);

        return view('admin.berita.index', compact('beritas', 'kategoris'));
    }

    /**
     * Form tambah berita baru
     */
    public function create(): View
    {
        $kategoris = collect([
            (object)['id' => 'Prestasi', 'nama_kategori' => 'Prestasi'],
            (object)['id' => 'Pengumuman', 'nama_kategori' => 'Pengumuman'],
            (object)['id' => 'Kegiatan', 'nama_kategori' => 'Kegiatan Siswa'],
            (object)['id' => 'Kurikulum', 'nama_kategori' => 'Kurikulum & Akademik'],
        ]);

        return view('admin.berita.create', compact('kategoris'));
    }

    /**
     * Simpan berita baru ke basis data
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'slug'           => 'required|string|max:255|unique:news,slug',
            'kategori_id'    => 'nullable|string',
            'isi_berita'     => 'nullable|string',
            'konten'         => 'nullable|string',
            'thumbnail'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'status_berita'  => 'nullable|string',
            'status_publish' => 'nullable|string',
        ]);

        $title = $validated['judul'];
        $slug = Str::slug($validated['slug'] ?: $title);
        $content = $request->input('isi_berita') ?? $request->input('konten') ?? 'Konten berita belum diisi.';
        $excerpt = Str::limit(strip_tags($content), 180);
        $category = $request->input('kategori_id') ?: 'Kegiatan';
        $isFeatured = $request->input('status_berita') === 'headline';

        $imagePath = null;
        if ($request->hasFile('thumbnail')) {
            $imagePath = $request->file('thumbnail')->store('news', 'public');
        }

        News::create([
            'title'        => $title,
            'slug'         => $slug,
            'category'     => $category,
            'excerpt'      => $excerpt,
            'content'      => $content,
            'author'       => auth()->user()->name ?? 'Administrator',
            'image'        => $imagePath,
            'published_at' => now(),
            'views'        => 0,
            'is_featured'  => $isFeatured,
        ]);

        return redirect()->route('berita')->with('success', 'Berita baru berhasil ditambahkan ke portal sekolah!');
    }

    /**
     * Tampilkan detail berita
     */
    public function show($id): View
    {
        $berita = is_numeric($id) ? News::findOrFail($id) : News::where('slug', $id)->firstOrFail();
        return view('admin.berita.show', compact('berita'));
    }

    /**
     * Form edit berita
     */
    public function edit($id): View
    {
        $beritas = is_numeric($id) ? News::findOrFail($id) : News::where('slug', $id)->firstOrFail();
        $kategoris = collect([
            (object)['id' => 'Prestasi', 'nama_kategori' => 'Prestasi'],
            (object)['id' => 'Pengumuman', 'nama_kategori' => 'Pengumuman'],
            (object)['id' => 'Kegiatan', 'nama_kategori' => 'Kegiatan Siswa'],
            (object)['id' => 'Kurikulum', 'nama_kategori' => 'Kurikulum & Akademik'],
        ]);

        return view('admin.berita.edit', compact('beritas', 'kategoris'));
    }

    /**
     * Perbarui data berita existing
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $berita = is_numeric($id) ? News::findOrFail($id) : News::where('slug', $id)->firstOrFail();

        $validated = $request->validate([
            'judul'          => 'required|string|max:255',
            'slug'           => 'required|string|max:255|unique:news,slug,' . $berita->id,
            'kategori_id'    => 'nullable|string',
            'isi_berita'     => 'nullable|string',
            'konten'         => 'nullable|string',
            'thumbnail'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:3072',
            'status_berita'  => 'nullable|string',
            'status_publish' => 'nullable|string',
        ]);

        $title = $validated['judul'];
        $slug = Str::slug($validated['slug'] ?: $title);
        $content = $request->input('isi_berita') ?? $request->input('konten') ?? $berita->content;
        $excerpt = Str::limit(strip_tags($content), 180);
        $category = $request->input('kategori_id') ?: $berita->category;
        $isFeatured = $request->input('status_berita') === 'headline';

        if ($request->hasFile('thumbnail')) {
            if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                Storage::disk('public')->delete($berita->image);
            }
            $berita->image = $request->file('thumbnail')->store('news', 'public');
        }

        $berita->title = $title;
        $berita->slug = $slug;
        $berita->category = $category;
        $berita->excerpt = $excerpt;
        $berita->content = $content;
        $berita->is_featured = $isFeatured;
        $berita->save();

        return redirect()->route('berita')->with('success', 'Data berita berhasil diperbarui!');
    }

    /**
     * Hapus berita dari sistem
     */
    public function destroy($id): RedirectResponse
    {
        $berita = is_numeric($id) ? News::findOrFail($id) : News::where('slug', $id)->firstOrFail();

        if ($berita->image && Storage::disk('public')->exists($berita->image)) {
            Storage::disk('public')->delete($berita->image);
        }

        $berita->delete();

        return redirect()->route('berita')->with('success', 'Berita telah berhasil dihapus dari sistem!');
    }

    /**
     * API helper untuk generate slug otomatis
     */
    public function checkSlug(Request $request)
    {
        $judul = $request->input('judul', '');
        $slug = Str::slug($judul);
        return response()->json(['slug' => $slug]);
    }
}
