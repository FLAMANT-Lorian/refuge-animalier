@props([
    'device' => 'mobile'
])

@php

    $css = [
        'mobile' => 'px-6 pt-[72px] fixed pb-10 left-0 right-0 bottom-0 top-[106px] bg-gray-50 flex flex-col',
        'desktop' => ''
    ];

    $classes_to_add = $css[$device];
@endphp

<div x-show="menuOpen"
     x-transition:enter="transition-all ease-in-out duration-200"
     x-transition:enter-start="-translate-x-full"
     x-transition:enter-end="translate-x-0"
     x-transition:leave="transition-all ease-in duration-200"
     x-transition:leave-start="translate-x-0"
     x-transition:leave-end="-translate-x-full"
    {!! $attributes->merge(['class' => $classes_to_add]) !!}>
    <x-public.navigation.navigation-links :device="$device"/>

    <div class="flex flex-col gap-1 border-t border-t-gray-100 pt-4 mt-auto">
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" class="self-start fill-white"
             alt="Logo des pattes heureuses">
        <p class="text-sm font-normal text-black">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</div>
