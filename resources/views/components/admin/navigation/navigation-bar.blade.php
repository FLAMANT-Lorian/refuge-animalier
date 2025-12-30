@php
    use App\Models\Animal;
@endphp

<div class="nav__container--admin">

    {{-- MENU DE NAVIGATION --}}
    <x-admin.navigation.navigation-links/>

    @can('create', Animal::class)
        {{-- BOUTON AJOUTER UN ANIMAL --}}
        <x-buttons.add-item-button
            :title="__('admin/navigation.add_animal')"
            :href="route('admin.animals.create')">
            {!! __('admin/navigation.add_animal') !!}
        </x-buttons.add-item-button>
    @endcan

    {{-- FOND DU MENU --}}
    <x-admin.navigation.navigation-bottom/>
</div>
