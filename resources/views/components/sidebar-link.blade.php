@props([
    'href' => '#',
    'active' => false,
    'badge' => null,
])

@php
$classes = $active
    ? 'group flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-sm font-semibold bg-sky-50 text-sky-700 border-l-4 border-sky-600 shadow-xs transition-colors'
    : 'group flex items-center gap-3 px-3.5 py-2.5 rounded-lg text-sm font-medium text-slate-600 hover:text-slate-900 hover:bg-slate-100/80 transition-colors';
@endphp

<a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    @if (isset($icon))
        <span class="shrink-0 text-slate-400 {{ $active ? 'text-sky-600' : 'group-hover:text-slate-600' }} transition-colors">
            {{ $icon }}
        </span>
    @endif

    <span class="flex-1 min-w-0 truncate">{{ $slot }}</span>

    @if ($badge)
        <span class="shrink-0 whitespace-nowrap inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-medium leading-none {{ $active ? 'bg-sky-200/80 text-sky-800' : 'bg-slate-100 text-slate-600 ring-1 ring-inset ring-slate-200 group-hover:bg-slate-200/80' }}">
            {{ $badge }}
        </span>
    @endif
</a>
