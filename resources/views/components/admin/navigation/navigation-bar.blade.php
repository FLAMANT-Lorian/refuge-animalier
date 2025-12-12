@props([
    'profile_data'
])
<div class="nav__container--admin">

    {{-- MENU DE NAVIGATION --}}
    <x-admin.navigation.navigation-links/>

    {{-- BOUTON AJOUTER UN ANIMAL --}}
    <x-buttons.add-item-button
        :title="__('admin/navigation.add_animal')"
        :href="route('admin.animals.create')">
        {!! __('admin/navigation.add_animal') !!}
    </x-buttons.add-item-button>

    {{-- FOND DU MENU --}}
    <x-admin.navigation.navigation-bottom :profile_data="$profile_data"/>
</div>
