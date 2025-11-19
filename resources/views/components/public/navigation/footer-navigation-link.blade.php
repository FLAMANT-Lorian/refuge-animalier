@php

    $nav_links = [
        ['label' => 'Accueil', 'title' => 'Vers la page d\'accueil', 'destination' => route('public.homepage'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => 'Nos animaux', 'title' => 'Vers la page des animaux', 'destination' => route('public.animals.index'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => 'À propos', 'title' => 'Vers la page à propos', 'destination' => route('public.about'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => 'Contact', 'title' => 'Vers la page de contact', 'destination' => route('public.contact'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
    ];

@endphp
<nav aria-label="Navigation secondaire"
     class="md:col-start-1 lg:col-start-1 md:col-end- lg:col-end-4 md:row-start-1 md:row-end-2">
    <h3 class="text-lg font-semibold text-white pb-4">Navigation</h3>
    <ul class="flex flex-col gap-2">
        @foreach($nav_links as $nav_link)
            <li>

                <x-public.navigation.navigation-link
                    :destination="$nav_link['destination']"
                    :title="$nav_link['title']"
                    :class="$nav_link['class']">
                    {!! $nav_link['label'] !!}
                </x-public.navigation.navigation-link>

            </li>
        @endforeach
    </ul>
</nav>
