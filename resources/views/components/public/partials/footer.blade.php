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

<footer class="bg-green-500 py-[5rem] px-6 flex flex-col gap-10">
    <div class="grid grid-cols-1 gap-6">
        <h2 class="sr-only">Footer</h2>
        <nav>
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
        <aside>
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
        <aside>
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
    <div class="flex flex-col gap-2 border-t border-t-white pt-6">
        <img src="{!! asset('assets/img/logo_small_white.svg') !!}" class="self-start fill-white"
             alt="Logo des pattes heureuses">
        <p class="text-sm font-normal text-white">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</footer>
