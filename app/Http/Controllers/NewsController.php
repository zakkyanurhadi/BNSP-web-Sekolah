<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $profile = SchoolProfile::first();
        $query = News::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('category', $request->kategori);
        }

        $newsList = $query->latest('published_at')->paginate(6)->withQueryString();
        $categories = News::select('category')->distinct()->pluck('category');
        $featuredNews = News::where('is_featured', true)->latest('published_at')->take(4)->get();

        return view('news.index', compact('profile', 'newsList', 'categories', 'featuredNews'));
    }

    public function show(string $slug): View
    {
        $profile = SchoolProfile::first();
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('views');

        $recentNews = News::where('id', '!=', $news->id)->latest('published_at')->take(4)->get();

        return view('news.show', compact('profile', 'news', 'recentNews'));
    }
}
