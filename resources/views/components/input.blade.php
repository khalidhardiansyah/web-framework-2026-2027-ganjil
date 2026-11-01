@props(['label', 'name', 'type' => 'text'])

<div>
    <label for="{{ $name }}" class="mb-1.5 block text-xs font-semibold uppercase tracking-wider text-slate-600">
        {{ $label }}
    </label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
        {{ $attributes->class([
            'w-full rounded-xl border px-3.5 py-2.5 text-sm text-slate-800 placeholder:text-slate-400 transition-colors focus:outline-hidden',
            'border-red-400 bg-red-50/20 focus:border-red-500 focus:ring-2 focus:ring-red-500/20' => $errors->has($name),
            'border-slate-300 bg-white focus:border-sky-500 focus:ring-2 focus:ring-sky-500/20' => ! $errors->has($name),
        ]) }}>
    @error($name)
        <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
    @enderror
</div>
