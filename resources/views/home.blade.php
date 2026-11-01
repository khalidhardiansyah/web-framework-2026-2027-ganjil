<x-auth-layout title="Dashboard">
    <div class="space-y-6">
        <!-- Status Notification Alert -->
        @if (session('status'))
            <x-alert type="success" class="flex items-center gap-2 shadow-xs">
                <svg class="h-5 w-5 shrink-0 text-green-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span>{{ session('status') }}</span>
            </x-alert>
        @endif

        <!-- Hero Greeting Banner -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-sky-700 via-sky-600 to-indigo-700 p-6 sm:p-8 text-white shadow-lg shadow-sky-900/10">
            <div class="relative z-10 max-w-2xl space-y-3">
                <div class="inline-flex items-center gap-2 rounded-full bg-white/15 px-3 py-1 text-xs font-medium backdrop-blur-xs">
                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                    Portal Praktikum Aktif
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Halo, {{ auth()->user()->name }}! 👋
                </h2>
                <p class="text-sm sm:text-base text-sky-100 leading-relaxed">
                    Selamat datang di halaman Dashboard praktikum Web Framework. Kamu telah berhasil terautentikasi ke dalam sistem menggunakan session guard Laravel.
                </p>
            </div>

            <!-- Background Aesthetic Decors -->
            <div class="absolute -right-10 -bottom-10 h-64 w-64 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
            <div class="absolute right-12 top-6 opacity-15 hidden lg:block pointer-events-none">
                <svg class="h-44 w-44 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342" />
                </svg>
            </div>
        </div>

        <!-- Metric & Stat Cards Grid -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Card 1: Status Autentikasi -->
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs transition-hover hover:shadow-md">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status Akun</span>
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-7.5 6H19.5a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 17.25Z" />
                        </svg>
                    </span>
                </div>
                <div class="mt-3">
                    <p class="text-2xl font-bold text-slate-800">Aktif &amp; Terverifikasi</p>
                    <p class="mt-1 text-xs text-slate-500">Guard: <span class="font-mono font-medium text-slate-700">web</span> &bull; Session regenerated</p>
                </div>
            </div>

            <!-- Card 2: Materi Perkuliahan -->
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs transition-hover hover:shadow-md">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Modul Praktikum</span>
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </span>
                </div>
                <div class="mt-3">
                    <p class="text-2xl font-bold text-slate-800">Pertemuan 2 &amp; 3</p>
                    <p class="mt-1 text-xs text-slate-500">Routing, Blade Components &amp; Auth</p>
                </div>
            </div>

            <!-- Card 3: Framework Stack -->
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs transition-hover hover:shadow-md">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Teknologi</span>
                    <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                        </svg>
                    </span>
                </div>
                <div class="mt-3">
                    <p class="text-2xl font-bold text-slate-800">Laravel 13 &amp; Tailwind v4</p>
                    <p class="mt-1 text-xs text-slate-500">Asset Bundler: <span class="font-mono text-slate-700">Vite 8.0</span></p>
                </div>
            </div>
        </div>

        <!-- Detail Cards: Information & Student Quick Checklist -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
            <!-- Left Card: Profil Pengguna -->
            <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2 mb-4">
                    <svg class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    Informasi Akun Anda
                </h3>

                <dl class="divide-y divide-slate-100 text-sm">
                    <div class="py-3 flex justify-between items-center">
                        <dt class="text-slate-500">Nama Lengkap</dt>
                        <dd class="font-medium text-slate-800">{{ auth()->user()->name }}</dd>
                    </div>
                    <div class="py-3 flex justify-between items-center">
                        <dt class="text-slate-500">Alamat Email</dt>
                        <dd class="font-mono text-slate-800">{{ auth()->user()->email }}</dd>
                    </div>
                    <div class="py-3 flex justify-between items-center">
                        <dt class="text-slate-500">Tanggal Terdaftar</dt>
                        <dd class="text-slate-700">{{ auth()->user()->created_at?->format('d F Y, H:i') ?? 'Baru saja' }}</dd>
                    </div>
                    <div class="py-3 flex justify-between items-center">
                        <dt class="text-slate-500">Status Keamanan</dt>
                        <dd>
                            <span class="inline-flex items-center rounded-md bg-emerald-50 px-2 py-1 text-xs font-medium text-emerald-700 ring-1 ring-inset ring-emerald-600/20">
                                Password Ter-Hash (Bcrypt)
                            </span>
                        </dd>
                    </div>
                </dl>
            </div>

            <!-- Right Card: Fitur Komponen yang Diimplementasikan -->
            <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs">
                <h3 class="text-base font-bold text-slate-800 flex items-center gap-2 mb-4">
                    <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                    </svg>
                    Fitur Komponen Pertemuan 2 &amp; 3
                </h3>

                <ul class="space-y-3 text-sm text-slate-600">
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-bold text-xs">✓</span>
                        <span><strong>Layout Komponen Terpisah:</strong> <code class="rounded bg-slate-100 px-1.5 py-0.5 text-xs font-mono text-sky-700">&lt;x-auth-layout&gt;</code> untuk dashboard dan <code class="rounded bg-slate-100 px-1.5 py-0.5 text-xs font-mono text-slate-700">&lt;x-layout&gt;</code> untuk shell dasar.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-bold text-xs">✓</span>
                        <span><strong>Sidebar Responsif:</strong> Sidebar permanen pada layar laptop/desktop (`md:`) dan drawer off-canvas dengan backdrop pada layar mobile.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-bold text-xs">✓</span>
                        <span><strong>Navbar &amp; Logout Terintegrasi:</strong> Tombol hamburger mobile, status sesi aktif, dan form logout dengan token CSRF.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="mt-0.5 flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-bold text-xs">✓</span>
                        <span><strong>Komponen Input &amp; Alert:</strong> <code class="rounded bg-slate-100 px-1.5 py-0.5 text-xs font-mono text-slate-700">&lt;x-input&gt;</code>, <code class="rounded bg-slate-100 px-1.5 py-0.5 text-xs font-mono text-slate-700">&lt;x-button&gt;</code>, dan <code class="rounded bg-slate-100 px-1.5 py-0.5 text-xs font-mono text-slate-700">&lt;x-alert&gt;</code> dengan pesan feedback.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-auth-layout>
