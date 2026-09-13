<?php

namespace App\Http\Controllers;

use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $profile = SchoolProfile::first();
        $latestNews = News::latest('published_at')->take(6)->get();
        $latestGalleries = Gallery::latest('activity_date')->take(6)->get();
        $featuredEkskul = Extracurricular::take(4)->get();

        return view('home', compact('profile', 'latestNews', 'latestGalleries', 'featuredEkskul'));
    }
}
