@php

    $items = [
        ['label'=> 'Nos animaux', 'title' => 'Aller vers la page des animaux', 'destination' => '#'],
        ['label'=> 'À propos', 'title' => 'Aller vers la page à propos', 'destination' => '#'],
        ['label'=> 'Contact', 'title' => 'Aller vers la page de contact', 'destination' => '#'],
    ];
@endphp

<ul class="flex flex-col gap-6">
    @foreach($items as $item)
        <li>
            <a class="text-2xl font-normal hover:font-bold active:font-bold transition-all"
               href="{!! $item['destination'] !!}" title="{!! $item['title'] !!}">
                {!! $item['label'] !!}
            </a>
        </li>
    @endforeach
</ul>
