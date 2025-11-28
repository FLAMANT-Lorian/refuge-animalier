@props([
    'profile_data'
])
<div class="nav__container--admin lg:h-screen">

    {{-- MENU DE NAVIGATION --}}
    <x-admin.navigation.navigation-links/>

    {{-- BOUTON AJOUTER UN ANIMAL --}}
    <x-buttons.add-item-button
        title="Ajouter un animal"
        :href="route('admin.animals.create')">
        Ajouter un animal
    </x-buttons.add-item-button>

    {{-- FOND DU MENU --}}
    <x-admin.navigation.navigation-bottom :profile_data="$profile_data"/>
</div>
