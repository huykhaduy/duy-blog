@props(['active' => false])

@php
$classes = $active 
    ? 'text-orange-500 hover:text-orange-700 font-medium hover:bg-orange-500 hover:text-white px-3 py-2 rounded-md'
    : 'text-gray-600 hover:text-gray-900 font-medium hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a> 