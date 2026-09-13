<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(Request $request): View
    {
        $profile = SchoolProfile::first();
        $query = Gallery::query();

        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('category', $request->kategori);
        }

        $galleries = $query->latest('activity_date')->get();
        $categories = Gallery::select('category')->distinct()->pluck('category');

        return view('gallery.index', compact('profile', 'galleries', 'categories'));
    }
}
