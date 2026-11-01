<x-auth-layout title="Dashboard Administrator">
    <div class="space-y-6">
        <!-- Hero Banner Admin -->
        <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-slate-900 via-indigo-950 to-slate-900 p-6 sm:p-8 text-white shadow-xl">
            <div class="relative z-10 max-w-2xl space-y-3">
                <div class="inline-flex items-center gap-2 rounded-full bg-rose-500/20 border border-rose-500/30 px-3 py-1 text-xs font-semibold text-rose-300 backdrop-blur-xs">
                    <span class="h-2 w-2 rounded-full bg-rose-400 animate-pulse"></span>
                    Tingkat Akses: Administrator
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                    Panel Administrasi Sistem
                </h2>
                <p class="text-sm sm:text-base text-slate-300 leading-relaxed">
                    Halaman ini hanya dapat diakses oleh pengguna dengan peran <code class="rounded bg-white/10 px-1.5 py-0.5 text-xs font-mono text-rose-300">admin</code>. Anda memiliki izin penuh untuk mengelola pengguna, peran, dan hak akses aplikasi.
                </p>
            </div>

            <div class="absolute -right-6 -bottom-8 opacity-10 pointer-events-none hidden sm:block">
                <svg class="h-56 w-56 text-white" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-7.5 6H19.5a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 17.25Z" />
                </svg>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Peran</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-indigo-50 text-indigo-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-800">3 Peran</p>
                <p class="mt-1 text-xs text-slate-500">Admin, Manager, User</p>
            </div>

            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Hak Akses</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-sky-50 text-sky-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-800">4 Permissions</p>
                <p class="mt-1 text-xs text-slate-500">Akses menu &amp; manajemen</p>
            </div>

            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Keamanan Route</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-emerald-50 text-emerald-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-7.5 6H19.5a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5H4.5A2.25 2.25 0 0 0 2.25 6.75v10.5A2.25 2.25 0 0 0 4.5 17.25Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-emerald-600">Terkontrol</p>
                <p class="mt-1 text-xs text-slate-500">Middleware: <code class="font-mono text-slate-700">role:admin</code></p>
            </div>

            <div class="rounded-xl border border-slate-200/80 bg-white p-5 shadow-xs">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Status Otorisasi</span>
                    <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-rose-50 text-rose-600">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                        </svg>
                    </span>
                </div>
                <p class="mt-3 text-2xl font-bold text-slate-800">Superuser</p>
                <p class="mt-1 text-xs text-slate-500">Semua Gate dizinkan</p>
            </div>
        </div>

        <!-- Matriks Hak Akses Peran -->
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <h3 class="text-base font-bold text-slate-800 mb-4 flex items-center gap-2">
                <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 12h16.5m-16.5 3.75h16.5M3.75 19.5h16.5M5.625 4.5h12.75a1.875 1.875 0 0 1 0 3.75H5.625a1.875 1.875 0 0 1 0-3.75Z" />
                </svg>
                Matriks Hak Akses Peran Sistem (RBAC)
            </h3>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm border-collapse">
                    <thead>
                        <tr class="border-b border-slate-200 bg-slate-50 text-xs font-semibold text-slate-600 uppercase">
                            <th class="py-3 px-4">Nama Peran</th>
                            <th class="py-3 px-4">Slug</th>
                            <th class="py-3 px-4">Akses Admin</th>
                            <th class="py-3 px-4">Akses Manager</th>
                            <th class="py-3 px-4">Akses User</th>
                            <th class="py-3 px-4">Kelola Pengguna</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-700">
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-semibold text-slate-800">Administrator</td>
                            <td class="py-3 px-4 font-mono text-xs text-rose-600">admin</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                        </tr>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-semibold text-slate-800">Manager</td>
                            <td class="py-3 px-4 font-mono text-xs text-sky-600">manager</td>
                            <td class="py-3 px-4 text-slate-300 font-bold">✕ Ditolak</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-slate-300 font-bold">✕ Ditolak</td>
                        </tr>
                        <tr class="hover:bg-slate-50/50">
                            <td class="py-3 px-4 font-semibold text-slate-800">Mahasiswa / User</td>
                            <td class="py-3 px-4 font-mono text-xs text-emerald-600">user</td>
                            <td class="py-3 px-4 text-slate-300 font-bold">✕ Ditolak</td>
                            <td class="py-3 px-4 text-slate-300 font-bold">✕ Ditolak</td>
                            <td class="py-3 px-4 text-emerald-600 font-bold">✓ Diizinkan</td>
                            <td class="py-3 px-4 text-slate-300 font-bold">✕ Ditolak</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-auth-layout>
