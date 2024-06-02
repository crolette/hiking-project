@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-emerald-100 text-emerald-200 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-emerald-500 dark:text-emerald-100'
            : 'bg-emerald-100 text-emerald-100 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-emerald-900 dark:text-emerald-100';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
