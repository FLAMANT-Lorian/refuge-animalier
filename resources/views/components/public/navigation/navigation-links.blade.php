@php

    $items = [
        ['label'=> 'Nos animaux', 'title' => 'Aller vers la page des animaux', 'destination' => '#'],
        ['label'=> 'À propos', 'title' => 'Aller vers la page à propos', 'destination' => route('public.about')],
        ['label'=> 'Contact', 'title' => 'Aller vers la page de contact', 'destination' => '#'],
    ];

@endphp

<ul class="flex flex-col gap-6 md:flex-row md:justify-end">
    @foreach($items as $item)
        <li>
            <x-public.navigation.navigation-link :last="$loop->last" :destination="$item['destination']" :title="$item['title']">
                {!! $item['label'] !!}
            </x-public.navigation.navigation-link>
        </li>
    @endforeach
</ul>
