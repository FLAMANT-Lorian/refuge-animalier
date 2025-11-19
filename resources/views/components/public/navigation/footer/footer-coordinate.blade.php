@php

    $coordinates = [
        ['label' => 'Rue des Lavandes 12, 4000 Liège, Belgique', 'title' => 'L’adresse de notre refuge', 'destination' => '#'],
        ['label' => 'contact@lespattesheureuses.be', 'title' => 'L’adresse e-mail du refuge', 'destination' => '#'],
        ['label' => '+32 81 23 45 67', 'title' => 'Le numéro de téléphone du refuge', 'destination' => '#'],
    ];

@endphp
<aside class="md:col-start-6 lg:col-start-4 md:col-end-11 lg:col-end-7 md:row-start-1 md:row-end-2">
    <h3 class="text-lg font-semibold text-white pb-4">Coordonnées</h3>
    <ul class="flex flex-col gap-2">
        @foreach($coordinates as $coordinate)
            <li>
                <a class="hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white"
                   href="{!! $coordinate['destination'] !!}"
                   title="{!! $coordinate['title'] !!}">
                    {!! $coordinate['label'] !!}
                </a>
            </li>
        @endforeach
    </ul>
</aside>
