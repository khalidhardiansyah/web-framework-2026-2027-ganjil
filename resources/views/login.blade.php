<x-layout title="Masuk - Belajar Laravel">
    <div class="flex min-h-screen flex-col items-center justify-center bg-slate-50 p-4 sm:p-6">
        <!-- Brand Header -->
        <div class="mb-6 flex flex-col items-center text-center">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-gradient-to-tr from-sky-600 to-sky-400 text-white shadow-lg shadow-sky-500/20 mb-3">
                <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75 22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3-4.5 16.5" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Web Framework</h1>
            <p class="text-xs font-medium text-sky-600 mt-0.5">Praktikum Pertemuan 2 &amp; 3</p>
        </div>

        <!-- Form Card -->
        <div class="w-full max-w-md rounded-2xl border border-slate-200/80 bg-white p-6 sm:p-8 shadow-sm">
            <div class="mb-6">
                <h2 class="text-xl font-bold text-slate-800">Masuk</h2>
                <p class="mt-1 text-xs text-slate-500">Gunakan akun Anda untuk mengakses dashboard perkuliahan.</p>
            </div>

            @if (session('status'))
                <x-alert type="success" class="mb-4">
                    {{ session('status') }}
                </x-alert>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <x-input label="Email" name="email" type="email" :value="old('email')" required autofocus placeholder="nama@example.com" />

                <x-input label="Password" name="password" type="password" required placeholder="••••••••" />

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 cursor-pointer select-none text-slate-600">
                        <input type="checkbox" name="remember" class="h-4 w-4 rounded border-slate-300 text-sky-600 focus:ring-sky-500">
                        <span class="text-xs font-medium">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <div class="pt-2">
                    <x-button class="w-full justify-center">
                        Masuk ke Dashboard
                    </x-button>
                </div>
            </form>

            <div class="mt-6 border-t border-slate-100 pt-4 text-center">
                <p class="text-xs text-slate-500">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}" class="font-semibold text-sky-600 hover:text-sky-700 hover:underline">
                        Daftar sekarang
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
