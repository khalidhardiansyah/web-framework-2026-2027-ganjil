@props([
    'title' => 'Dashboard',
])

<header class="sticky top-0 z-20 flex h-16 shrink-0 items-center justify-between border-b border-slate-200/80 bg-white/95 px-4 sm:px-6 backdrop-blur-sm">
    <!-- Left: Mobile Toggle & Page Title -->
    <div class="flex items-center gap-3 sm:gap-4">
        <button type="button" id="sidebar-open-btn" class="rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700 md:hidden transition-colors" aria-label="Buka navigasi sidebar">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="flex flex-col">
            <h1 class="text-lg font-bold text-slate-800 leading-tight">
                {{ $title }}
            </h1>
            <span class="text-xs text-slate-400 hidden sm:inline">
                Aplikasi Web Framework
            </span>
        </div>
    </div>

    <!-- Right: Status & User Info -->
    <div class="flex items-center gap-3">
        <!-- Status Pill -->
        <div class="hidden sm:inline-flex items-center gap-1.5 rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700 border border-emerald-200">
            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
            Sesi Aktif
        </div>

        <!-- Quick User Info -->
        <div class="flex items-center gap-2 pl-2 border-l border-slate-200">
            <div class="flex h-8 w-8 items-center justify-center rounded-full bg-sky-100 text-sky-700 font-semibold text-xs border border-sky-200">
                {{ strtoupper(substr(auth()->user()?->name ?? 'U', 0, 1)) }}
            </div>
            <span class="text-sm font-medium text-slate-700 hidden md:inline">
                {{ auth()->user()?->name ?? 'User' }}
            </span>
        </div>
    </div>
</header>
