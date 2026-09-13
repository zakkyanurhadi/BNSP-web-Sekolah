<!-- Mobile backdrop -->
<div x-show="sidebarOpen" 
     @click="sidebarOpen = false" 
     x-transition:enter="transition-opacity ease-linear duration-300"
     x-transition:enter-start="opacity-0"
     x-transition:enter-end="opacity-100"
     x-transition:leave="transition-opacity ease-linear duration-300"
     x-transition:leave-start="opacity-100"
     x-transition:leave-end="opacity-0"
     class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-sm lg:hidden"
     x-cloak></div>

<!-- Sidebar -->
<aside class="fixed top-0 left-0 z-50 w-64 h-screen bg-white border-r border-slate-200/80 text-slate-800 flex flex-col transition-transform duration-300 ease-in-out lg:translate-x-0"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
    
    <!-- Branding Header: Panel CMS Manajemen Konten Sekolah -->
    <div class="flex items-center gap-3 px-6 py-5 border-b border-slate-100">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-700 to-indigo-800 text-white flex items-center justify-center shadow-md shadow-blue-600/20 flex-shrink-0">
            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
            </svg>
        </div>
        <div class="flex flex-col min-w-0">
            <span class="text-base font-extrabold tracking-tight text-slate-900 leading-snug truncate">Panel CMS</span>
            <span class="text-[10.5px] font-bold text-blue-700 uppercase tracking-wider truncate">Konten Sekolah</span>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-5 space-y-1.5 overflow-y-auto">
        <div class="px-3 pb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Menu Utama</div>

        <!-- 1. Dashboard -->
        <a href="{{ route('admin') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->routeIs('admin') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Dashboard</span>
        </a>

        <!-- 2. Berita Sekolah -->
        <a href="{{ route('berita') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->is('admin/berita*') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->is('admin/berita*') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6"></path>
            </svg>
            <span>Berita Sekolah</span>
        </a>

        <!-- 3. Kategori Berita -->
        <a href="{{ route('kategori') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->is('admin/kategori*') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->is('admin/kategori*') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            <span>Kategori</span>
        </a>

        <!-- 4. Galeri Multimedia -->
        <a href="{{ route('admin.galeri') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->is('admin/galeri*') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->is('admin/galeri*') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span>Galeri Foto</span>
        </a>

        <!-- 5. Pesan Kontak -->
        <a href="{{ route('admin.pesan') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->is('admin/pesan*') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->is('admin/pesan*') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span>Pesan Masuk</span>
        </a>

        <!-- 6. Pengguna -->
        <a href="{{ route('pengguna') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl transition-all duration-200 overflow-hidden {{ request()->is('admin/pengguna*') ? 'bg-blue-50/90 text-blue-700 border-l-4 border-blue-700 shadow-xs' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
            <svg class="w-5 h-5 flex-shrink-0 {{ request()->is('admin/pengguna*') ? 'text-blue-700' : 'text-slate-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
            </svg>
            <span>Pengguna</span>
        </a>

        <div class="pt-4 px-3 pb-2 text-[10px] font-bold tracking-wider text-slate-400 uppercase">Tautan Publik</div>

        <!-- 7. Lihat Website Publik -->
        <a href="{{ url('/') }}" target="_blank" 
           class="relative flex items-center justify-between px-3.5 py-2.5 text-sm font-medium rounded-xl text-slate-600 hover:bg-slate-50 hover:text-blue-600 transition-colors">
            <span class="flex items-center gap-3">
                <svg class="w-5 h-5 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                <span>Buka Website</span>
            </span>
            <span class="text-[10px] bg-slate-100 text-slate-500 px-1.5 py-0.5 rounded font-mono">↗</span>
        </a>

        <!-- 8. Keluar (Logout) -->
        <a href="{{ route('admin.logout') }}" 
           class="relative flex items-center gap-3 px-3.5 py-2.5 text-sm font-semibold rounded-xl text-rose-600 hover:bg-rose-50 hover:text-rose-700 transition-colors mt-2">
            <svg class="w-5 h-5 text-rose-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span>Keluar Sistem</span>
        </a>
    </nav>

    <!-- Footer Sidebar -->
    <div class="p-4 border-t border-slate-100 bg-slate-50/50">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center text-xs">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="flex flex-col min-w-0">
                <span class="text-xs font-semibold text-slate-800 truncate">{{ Auth::user()->name ?? 'Administrator' }}</span>
                <span class="text-[10px] text-slate-500 truncate">{{ Auth::user()->email ?? 'admin@sekolah.web.id' }}</span>
            </div>
        </div>
    </div>
</aside>
