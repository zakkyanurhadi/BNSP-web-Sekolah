<header class="sticky top-0 z-30 bg-white border-b border-slate-200/80 px-3 sm:px-4 md:px-6 py-3 flex items-center justify-between shadow-xs">
    <!-- Left Section: Mobile Drawer Toggle & School Branding / Clock -->
    <div class="flex items-center gap-2 sm:gap-3 min-w-0">
        <button @click="sidebarOpen = !sidebarOpen" 
                type="button" 
                class="p-2 rounded-lg text-slate-500 hover:bg-slate-100 hover:text-slate-700 focus:outline-none lg:hidden transition-colors flex-shrink-0">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <div class="flex items-center gap-3 min-w-0" x-data="{ timeStr: '' }" x-init="
            const updateClock = () => {
                const now = new Date();
                const hrs = String(now.getHours()).padStart(2, '0');
                const mins = String(now.getMinutes()).padStart(2, '0');
                const secs = String(now.getSeconds()).padStart(2, '0');
                timeStr = hrs + ':' + mins + ':' + secs;
            };
            updateClock();
            setInterval(updateClock, 1000);
        ">
            <div class="hidden sm:flex items-center gap-2 bg-blue-50/70 border border-blue-100 text-blue-800 px-3 py-1 rounded-lg text-xs font-semibold">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                <span>Portal CMS Sekolah</span>
            </div>
            <h1 class="text-xs sm:text-sm font-semibold text-slate-600 tracking-tight whitespace-nowrap">
                Waktu Server : <span class="font-bold text-blue-700" x-text="timeStr"></span>
            </h1>
        </div>
    </div>

    <!-- Right Section: Web Preview & Profile Dropdown -->
    <div class="flex items-center gap-3 flex-shrink-0">
        <a href="{{ url('/') }}" target="_blank" 
           class="hidden md:inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-600 bg-slate-100 hover:bg-slate-200 hover:text-blue-700 rounded-lg transition-colors">
            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            <span>Pratinjau Situs</span>
        </a>

        <!-- Profile Dropdown -->
        <div class="relative" x-data="{ dropdownOpen: false }">
            <button @click="dropdownOpen = !dropdownOpen" 
                    @click.away="dropdownOpen = false" 
                    type="button" 
                    class="flex items-center gap-2 sm:gap-3 p-1 sm:p-1.5 sm:pl-2.5 rounded-full hover:bg-slate-100 transition-all border border-transparent hover:border-slate-200 focus:outline-none">
                <span class="text-xs sm:text-sm font-medium text-slate-700 hidden sm:inline-block max-w-[120px] md:max-w-xs truncate">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </span>
                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 font-bold flex items-center justify-center text-xs sm:text-sm border border-blue-200 shadow-xs overflow-hidden flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <svg class="w-4 h-4 text-slate-400 transition-transform duration-200" :class="dropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div x-show="dropdownOpen" 
                 x-transition:enter="transition ease-out duration-100"
                 x-transition:enter-start="transform opacity-0 scale-95"
                 x-transition:enter-end="transform opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="transform opacity-100 scale-100"
                 x-transition:leave-end="transform opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 divide-y divide-slate-100"
                 x-cloak>
                
                <!-- User Details Header -->
                <div class="px-4 py-3">
                    <p class="text-sm font-semibold text-slate-800 truncate">{{ Auth::user()->name ?? 'Administrator CMS Sekolah' }}</p>
                    <p class="text-xs text-slate-500 truncate">{{ Auth::user()->email ?? 'admin@sekolah.web.id' }}</p>
                    <span class="inline-flex items-center mt-1.5 px-2 py-0.5 rounded-md text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                        Admin Aktif
                    </span>
                </div>

                <!-- Action Links -->
                <div class="py-1">
                    <a href="{{ route('admin') }}" class="flex items-center gap-2 px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 font-medium">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        <span>Dasbor Utama</span>
                    </a>
                    <a href="{{ url('/') }}" target="_blank" class="flex items-center gap-2 px-4 py-2 text-xs text-slate-600 hover:bg-slate-50 font-medium">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        <span>Kunjungi Situs</span>
                    </a>
                </div>

                <!-- Logout Button -->
                <div class="py-1">
                    <a href="{{ route('admin.logout') }}" 
                       class="flex items-center gap-2 px-4 py-2 text-xs text-rose-600 hover:bg-rose-50 font-semibold transition-colors">
                        <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Keluar (Logout)</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
