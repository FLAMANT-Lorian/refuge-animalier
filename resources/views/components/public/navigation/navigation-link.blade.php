@props([
    'device' => 'mobile',
    'destination',
    'title',
])

@php

    $css = [
        'mobile' => 'text-2xl font-normal hover:font-bold active:font-bold transition-all',
        'desktop' => ''
    ];

    $classes_to_add = $css[$device];
@endphp

<a {!! $attributes->merge(['class' => $classes_to_add]) !!}
   href="{!! $destination !!}" title="{!! $title !!}">
    {!! $slot !!}
</a>
