<x-auth-layout title="Dashboard Manager">
    <div class="space-y-6">
        <!-- Hero Banner Manager -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-sky-800 via-sky-700 to-indigo-800 p-6 sm:p-8 text-white shadow-xl">
            <div class="relative z-10 max-w-2xl space-y-3">
                <div class="inline-flex items-center gap-2 rounded-full bg-sky-400/20 border border-sky-400/30 px-3 py-1 text-xs font-semibold text-sky-200 backdrop-blur-xs">
                    <span class="h-2 w-2 rounded-full bg-sky-300 animate-pulse"></span>
                    Tingkat Akses: Manager &amp; Administrator
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Panel Kendali Manajerial &amp; Pemantauan
                </h2>
                <p class="text-sm sm:text-base text-sky-100 leading-relaxed">
                    Halaman ini dapat diakses oleh peran <code class="rounded bg-white/10 px-1.5 py-0.5 text-xs font-mono text-sky-200">manager</code> dan <code class="rounded bg-white/10 px-1.5 py-0.5 text-xs font-mono text-sky-200">admin</code>. Anda dapat meninjau data operasional dan laporan kemajuan praktikum.
                </p>
            </div>

            <div class="absolute -right-6 -bottom-8 opacity-10 pointer-events-none hidden sm:block">
                <svg class="h-56 w-56 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" />
                </svg>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Modul Praktikum</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-800">3 Modul Aktif</p>
                <p class="mt-1 text-xs text-slate-500">Routing, Blade, Auth &amp; RBAC</p>
            </div>

            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status Otorisasi</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-emerald-600">Terverifikasi</p>
                <p class="mt-1 text-xs text-slate-500">Middleware: <code class="font-mono text-slate-700">role:admin,manager</code></p>
            </div>

            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Cakupan Wewenang</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-800">Manajerial</p>
                <p class="mt-1 text-xs text-slate-500">Izin: <code class="font-mono text-slate-700">akses-manager</code></p>
            </div>
        </div>

        <!-- Activity Overview -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-800 mb-3 flex items-center gap-2">
                <svg class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Ringkasan Laporan Operasional
            </h3>
            <p class="text-sm text-slate-600 leading-relaxed">
                Sebagai Manager, Anda dapat memantau keterlibatan mahasiswa pada masing-masing topik perkuliahan. Halaman khusus administrator (seperti konfigurasi sistem &amp; manajemen database pengguna) diproteksi secara ketat dari akun non-admin.
            </p>
        </div>
    </div>
</x-auth-layout>
