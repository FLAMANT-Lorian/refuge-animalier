@php

    $items = [
        ['icon' => 'dashboard','label'=> 'Tableau de bord', 'title' => 'Aller vers le tableau de bord', 'destination' => route('admin.dashboard')],
        ['icon' => 'animals','label'=> 'Animaux', 'title' => 'Aller vers la page des animaux', 'destination' => route('admin.animals.index')],
        ['icon' => 'adoption-requests','label'=> 'Demandes d’adoptions', 'title' => 'Aller vers la page des demandes d’adoptions', 'destination' => route('admin.adoption-requests.index')],
        ['icon' => 'animal-sheets','label'=> 'Gestion des fiches', 'title' => 'Aller vers la page des fiches des animaux', 'destination' => route('admin.animal-sheets.index')],
        ['icon' => 'messages','label'=> 'Messages', 'title' => 'Aller vers la page des messages', 'destination' => route('admin.messages.index')],
        ['icon' => 'volunteers','label'=> 'Bénévoles', 'title' => 'Aller vers la page des bénévoles', 'destination' => route('admin.volunteers.index')],
    ];

@endphp

<ul class="flex flex-col gap-6 lg:gap-4 mt-12 lg:mt-20 mb-auto">
    @foreach($items as $item)
        <li class="group">
            <x-admin.navigation.navigation-link
                :destination="$item['destination']"
                :icon="$item['icon']"
                class="lg:group-hover:text-white"
                :title="$item['title']">
                {!! $item['label'] !!}
            </x-admin.navigation.navigation-link>
        </li>
    @endforeach
</ul>
<?php
