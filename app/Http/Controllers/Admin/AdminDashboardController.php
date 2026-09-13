<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Extracurricular;
use App\Models\Gallery;
use App\Models\News;
use App\Models\SchoolProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Tampilkan Halaman Dasbor Utama Panel CMS Manajemen Konten Sekolah.
     */
    public function index(): View
    {
        $totalBerita = News::count();
        $beritaCount = News::where('published_at', '<=', now())->count();
        $kategorisCount = News::distinct('category')->count('category');
        $usersCount = User::count();
        $totalGaleri = Gallery::count();
        $totalEkskul = Extracurricular::count();
        $totalPesan = ContactMessage::count();
        $pesanUnread = ContactMessage::where('is_read', false)->count();

        $profile = SchoolProfile::first();
        $beritaTerbaru = News::latest('published_at')->take(5)->get();
        $pesanTerbaru = ContactMessage::latest()->take(5)->get();

        return view('admin.index', compact(
            'totalBerita',
            'beritaCount',
            'kategorisCount',
            'usersCount',
            'totalGaleri',
            'totalEkskul',
            'totalPesan',
            'pesanUnread',
            'profile',
            'beritaTerbaru',
            'pesanTerbaru'
        ));
    }
}
