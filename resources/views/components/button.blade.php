@props([
    'variant' => 'primary',
    'type' => 'submit',
    'href' => null,
])

@php
$baseClasses = 'inline-flex items-center justify-center gap-2 rounded-lg px-4 py-2.5 text-sm font-semibold transition-all duration-150 focus:outline-hidden disabled:opacity-50 disabled:pointer-events-none cursor-pointer';

$variantClasses = match ($variant) {
    'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-2 focus:ring-red-500/30 shadow-xs',
    'secondary' => 'bg-slate-100 text-slate-700 hover:bg-slate-200 focus:ring-2 focus:ring-slate-300',
    'outline' => 'border border-slate-300 bg-white text-slate-700 hover:bg-slate-50 focus:ring-2 focus:ring-slate-200 shadow-2xs',
    default => 'bg-sky-600 text-white hover:bg-sky-700 focus:ring-2 focus:ring-sky-500/30 shadow-xs',
};
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => "$baseClasses $variantClasses"]) }}>
        {{ $slot }}
    </button>
@endif
