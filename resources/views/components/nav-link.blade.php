@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-zinc-50 dark:border-zinc-50 text-sm font-medium leading-5 text-gray-50 dark:text-gray-100 focus:outline-none focus:border-zinc-50 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-zinc-50 focus:outline-none focus:text-zinc-50 dark:focus:text-gray-300 focus:border-gray-300 dark:focus:border-zinc-50 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
