@props([
    'isMobile' => false,
])

<div class="flex h-full flex-col justify-between bg-white">
    <!-- Top Section: Brand & Nav Links -->
    <div class="flex flex-col flex-1 overflow-y-auto">
        <!-- Brand Header -->
        <div class="flex items-center justify-between border-b border-slate-200/80 px-6 py-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-tr from-sky-600 to-sky-400 text-white shadow-md shadow-sky-500/20 group-hover:scale-105 transition-transform">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                    </svg>
                </div>
                <div class="flex flex-col">
                    <span class="text-base font-bold text-slate-800 tracking-tight leading-tight">Web Framework</span>
                    <span class="text-xs font-medium text-sky-600">Pertemuan 2 &amp; 3 (RBAC)</span>
                </div>
            </a>

            @if ($isMobile)
                <button type="button" id="sidebar-close-btn" class="rounded-lg p-2 text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-colors" aria-label="Tutup sidebar">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            @endif
        </div>

        <!-- Navigation Links -->
        <div class="space-y-6 px-4 py-5">
            <!-- Section: Navigasi Utama -->
            <div>
                <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                    Menu Utama
                </p>
                <div class="space-y-1">
                    <x-sidebar-link :href="route('home')" :active="request()->routeIs('home')">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                        </x-slot:icon>
                        Dashboard
                    </x-sidebar-link>

                    @if (Route::has('about'))
                        <x-sidebar-link :href="route('about')" :active="request()->routeIs('about')">
                            <x-slot:icon>
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                            </x-slot:icon>
                            Tentang Aplikasi
                        </x-sidebar-link>
                    @endif
                </div>
            </div>

            <!-- Section: Menu Khusus Administrator (Hanya terlihat jika memiliki izin akses-admin) -->
            @can('akses-admin')
            <div>
                <p class="px-3 text-xs font-semibold uppercase tracking-wider text-rose-500 mb-2">
                    Administrator
                </p>
                <div class="space-y-1">
                    <x-sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')" badge="Admin">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-7.5 6H19.5a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 17.25Z" />
                            </svg>
                        </x-slot:icon>
                        Panel Admin
                    </x-sidebar-link>
                </div>
            </div>
            @endcan

            <!-- Section: Menu Khusus Manager (Terlihat oleh manager & admin) -->
            @can('akses-manager')
            <div>
                <p class="px-3 text-xs font-semibold uppercase tracking-wider text-sky-600 mb-2">
                    Manajerial
                </p>
                <div class="space-y-1">
                    <x-sidebar-link :href="route('manager.dashboard')" :active="request()->routeIs('manager.*')" badge="Manager">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                            </svg>
                        </x-slot:icon>
                        Panel Manager
                    </x-sidebar-link>
                </div>
            </div>
            @endcan

            <!-- Section: Materi Perkuliahan -->
            <div>
                <p class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400 mb-2">
                    Materi Belajar
                </p>
                <div class="space-y-1">
                    <x-sidebar-link href="#" badge="Pert 2">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </x-slot:icon>
                        Blade Components
                    </x-sidebar-link>

                    <x-sidebar-link href="#" badge="Pert 3">
                        <x-slot:icon>
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                            </svg>
                        </x-slot:icon>
                        Auth &amp; Session
                    </x-sidebar-link>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section: User Profile & Role Status -->
    <div class="border-t border-slate-200/80 p-4 bg-slate-50/50">
        @php
            $roleLabel = auth()->user()?->hasRole('admin')
                ? 'Administrator'
                : (auth()->user()?->hasRole('manager') ? 'Manager' : 'Mahasiswa');
            $roleBadgeClass = auth()->user()?->hasRole('admin')
                ? 'bg-rose-100 text-rose-700 border-rose-200'
                : (auth()->user()?->hasRole('manager') ? 'bg-sky-100 text-sky-700 border-sky-200' : 'bg-slate-100 text-slate-700 border-slate-200');
        @endphp

        <div class="flex items-center gap-3 mb-3">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-bold border border-sky-200 text-sm">
                {{ strtoupper(substr(auth()->user()?->name ?? 'User', 0, 1)) }}
            </div>
            <div class="flex flex-col min-w-0 flex-1">
                <span class="text-sm font-semibold text-slate-800 truncate">
                    {{ auth()->user()?->name ?? 'Pengguna' }}
                </span>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="inline-block text-[10px] font-semibold px-2 py-0.5 rounded-full border {{ $roleBadgeClass }}">
                        {{ $roleLabel }}
                    </span>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center justify-center gap-2 rounded-lg border border-red-200 bg-white px-3 py-2 text-xs font-semibold text-red-600 hover:bg-red-50 hover:border-red-300 transition-colors cursor-pointer">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                Keluar (Logout)
            </button>
        </form>
    </div>
</div>
