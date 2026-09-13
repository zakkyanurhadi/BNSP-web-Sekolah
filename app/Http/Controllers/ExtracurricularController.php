<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ExtracurricularController extends Controller
{
    public function index(Request $request): View
    {
        $profile = SchoolProfile::first();
        $query = Extracurricular::query();

        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('category', $request->kategori);
        }

        $ekskuls = $query->orderBy('name')->get();
        $categories = Extracurricular::select('category')->distinct()->pluck('category');

        return view('extracurricular.index', compact('profile', 'ekskuls', 'categories'));
    }

    public function show(string $slug): View
    {
        $profile = SchoolProfile::first();
        $ekskul = Extracurricular::where('slug', $slug)->firstOrFail();
        $otherEkskuls = Extracurricular::where('id', '!=', $ekskul->id)->take(3)->get();

        return view('extracurricular.show', compact('profile', 'ekskul', 'otherEkskuls'));
    }
}
