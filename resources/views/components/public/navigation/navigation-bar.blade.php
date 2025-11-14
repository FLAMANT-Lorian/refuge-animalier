@props([
    'device' => 'mobile'
])

@php

    $css = [
        'mobile' => 'px-6 pt-[72px] pb-10 fixed bg-gray-50 -left-[100%] top-[106px] w-full h-[calc(100vh-106px)] peer-checked:left-0 transition-all flex flex-col',
        'desktop' => ''
    ];

    $classes_to_add = $css[$device];
@endphp

<div {!! $attributes->merge(['class' => $classes_to_add]) !!}>
    <x-public.navigation.navigation-links :device="$device"/>

    <div class="flex flex-col gap-1 border-t border-t-gray-100 pt-4 mt-auto">
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" class="self-start fill-white"
             alt="Logo des pattes heureuses">
        <p class="text-sm font-normal text-black">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</div>
