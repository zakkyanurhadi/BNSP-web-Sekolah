<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminAuthController extends Controller
{
    /**
     * Tampilkan formulir login Administrator CMS Sekolah.
     */
    public function showLoginForm(): View|RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }

        return view('admin.login');
    }

    /**
     * Proses otentikasi login admin CMS.
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Alamat surel (email) wajib diisi.',
            'email.email'       => 'Format alamat surel tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin'))
                ->with('success', 'Selamat datang kembali di Panel CMS Manajemen Konten Sekolah!');
        }

        return back()->withErrors([
            'email' => 'Kombinasi surel dan sandi tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    /**
     * Proses keluar sistem (logout).
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')
            ->with('success', 'Anda telah berhasil keluar dari Panel Administrator.');
    }
}
