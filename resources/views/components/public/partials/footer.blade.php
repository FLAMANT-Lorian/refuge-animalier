@php
    $nav_links = [
        ['label' => 'Accueil', 'title' => 'Vers la page d\'accueil', 'destination' => '#'],
        ['label' => 'Nos animaux', 'title' => 'Vers la page des animaux', 'destination' => '#'],
        ['label' => 'À propos', 'title' => 'Vers la page à propos', 'destination' => '#'],
        ['label' => 'Contact', 'title' => 'Vers la page de contact', 'destination' => '#'],
    ];

    $coordinates = [
        ['label' => 'Rue des Lavandes 12, 4000 Liège, Belgique', 'title' => 'L’adresse de notre refuge', 'destination' => '#'],
        ['label' => 'contact@lespattesheureuses.be', 'title' => 'L’adresse e-mail du refuge', 'destination' => '#'],
        ['label' => '+32 81 23 45 67', 'title' => 'Le numéro de téléphone du refuge', 'destination' => '#'],
    ];

        $opening_hours = ['Lundi - Vendredi : 12h30 - 17h30', 'Samedi : 10h00 - 17h30', 'Dimanche : Fermé'];
@endphp

<footer class="bg-green-500 py-[5rem] md:py-[6rem] lg:py-[8rem] px-6 md:px-12 lg:px-[12rem] flex flex-col gap-10 md:grid md:grid-cols-10 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:gap-x-6 md:gap-y-10">
    <div class="grid grid-cols-1 gap-6 md:grid-cols-subgrid md:col-start-1 md:col-end-11 lg:col-start-5 lg:col-end-14 md:gap-y-14">
        <h2 class="sr-only">Footer</h2>
        <nav class="md:col-start-1 lg:col-start-1 md:col-end- lg:col-end-4 md:row-start-1 md:row-end-2">
            <h3 class="text-lg font-semibold text-white pb-4">Navigation</h3>
            <ul class="flex flex-col gap-2">
                @foreach($nav_links as $nav_link)
                    <li>
                        <a class="text-base font-normal text-white"
                           href="{!! $nav_link['destination'] !!}"
                           title="{!! $nav_link['title'] !!}">
                            {!! $nav_link['label'] !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <aside class="md:col-start-6 lg:col-start-4 md:col-end-11 lg:col-end-7 md:row-start-1 md:row-end-2">
            <h3 class="text-lg font-semibold text-white pb-4">Coordonnées</h3>
            <ul class="flex flex-col gap-2">
                @foreach($coordinates as $coordinate)
                    <li>
                        <a class="text-base font-normal text-white"
                           href="{!! $coordinate['destination'] !!}"
                           title="{!! $coordinate['title'] !!}">
                            {!! $coordinate['label'] !!}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <aside class="md:col-start-1 lg:col-start-7 md:col-end-6 md:col-end-10 md:row-start-2 md:row-end-3 lg:row-start-1 lg:row-end-2">
            <h3 class="text-lg font-semibold text-white pb-4">Heures d’ouvertures</h3>
            <ul class="flex flex-col gap-2">
                @foreach($opening_hours as $opening_hour)
                    <li class="text-base font-normal text-white">
                        {!! $opening_hour !!}
                    </li>
                @endforeach
            </ul>
        </aside>
    </div>
    <div class="flex flex-col md:flex-row lg:flex-col md:items-center lg:items-start gap-2 border-t lg:border-none border-t-white pt-6 lg:p-0 md:col-start-1 md:col-end-11 lg:col-end-4 lg:row-start-1 lg:row-end-2">
        <a href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img src="{!! asset('assets/img/logo_small_white.svg') !!}" class="self-start"
                 alt="Logo des pattes heureuses">
        </a>
        <p class="text-sm font-normal text-white">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</footer>
