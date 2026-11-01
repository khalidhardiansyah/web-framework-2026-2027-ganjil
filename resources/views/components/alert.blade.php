@props([
    'type' => 'success',
])

@php
$config = match ($type) {
    'error' => [
        'wrapper' => 'bg-red-50 text-red-800 border-red-200',
        'icon' => 'text-red-500',
    ],
    'info' => [
        'wrapper' => 'bg-sky-50 text-sky-800 border-sky-200',
        'icon' => 'text-sky-500',
    ],
    default => [
        'wrapper' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
        'icon' => 'text-emerald-500',
    ],
};
@endphp

<div {{ $attributes->merge(['class' => 'flex items-start gap-3 rounded-xl border p-4 text-sm font-medium shadow-2xs ' . $config['wrapper']]) }} role="alert">
    <span class="shrink-0 mt-0.5 {{ $config['icon'] }}">
        @if ($type === 'error')
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        @elseif ($type === 'info')
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
            </svg>
        @else
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        @endif
    </span>

    <div class="flex-1 leading-normal">
        {{ $slot }}
    </div>
</div>
