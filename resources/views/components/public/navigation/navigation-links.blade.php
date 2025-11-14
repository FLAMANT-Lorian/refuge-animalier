@props([
    'device' => 'mobile'
])

@php

    $items = [
        ['label'=> 'Nos animaux', 'title' => 'Aller vers la page des animaux', 'destination' => '#'],
        ['label'=> 'À propos', 'title' => 'Aller vers la page à propos', 'destination' => route('public.about')],
        ['label'=> 'Contact', 'title' => 'Aller vers la page de contact', 'destination' => '#'],
    ];

    $css = [
        'mobile' => 'flex flex-col gap-6',
        'desktop' => ''
    ];

    $classes_to_add = $css[$device];
@endphp

<ul {!! $attributes->merge(['class' => $classes_to_add]) !!}>
    @foreach($items as $item)
        <li>
            <x-public.navigation.navigation-link :device="$device" :destination="$item['destination']" :title="$item['title']">
                {!! $item['label'] !!}
            </x-public.navigation.navigation-link>
        </li>
    @endforeach
</ul>
