<x-auth-layout title="Tentang Aplikasi">
    <div class="max-w-3xl space-y-6">
        <div class="rounded-xl border border-slate-200/80 bg-white p-6 shadow-xs">
            <h2 class="text-2xl font-bold text-slate-800 mb-2">Tentang Aplikasi Praktikum</h2>
            <p class="text-slate-600 leading-relaxed mb-4">
                Aplikasi ini dikembangkan sebagai materi ajar mata kuliah Web Framework (Pertemuan 2 dan 3), yang mencakup pemahaman routing, Blade component, controller, autentikasi sesi, serta styling modern menggunakan Tailwind CSS v4.
            </p>

            <div class="rounded-lg bg-slate-50 p-4 border border-slate-200 text-sm space-y-2 mb-6">
                <div class="flex justify-between">
                    <span class="text-slate-500">Mata Kuliah</span>
                    <span class="font-semibold text-slate-700">Web Framework</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Semester</span>
                    <span class="font-semibold text-slate-700">Ganjil 2026</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-slate-500">Framework</span>
                    <span class="font-semibold text-slate-700">Laravel 13 &bull; PHP 8.3</span>
                </div>
            </div>

            <a href="{{ route('home') }}" class="inline-flex items-center gap-2 rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white hover:bg-sky-700 transition-colors">
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-auth-layout>
