@php
    use App\Enums\AvailableLanguage;use App\Models\Animal;
@endphp

<div class="nav__container--admin">

    {{-- MENU DE NAVIGATION --}}
    <x-admin.navigation.navigation-links/>

    <form class="mb-4">
        <label class="sr-only">Sélécteur de langue</label> <select
            class="hover:cursor-pointer select_form pl-2 pr-7 py-2.5 border border-green-500 rounded-lg font-medium"
            wire:model.live="locale">
            @foreach(AvailableLanguage::cases() as $locale)
                <option value="{{ $locale->value }}">{{ __('enum.' . $locale->value) }}</option>
            @endforeach
        </select>
    </form>

    @can('create', Animal::class)
        {{-- BOUTON AJOUTER UN ANIMAL --}}
        <x-buttons.add-item-button :title="__('admin/navigation.add_animal')"
                                   :href="route('admin.animals.create', ['locale' => app()->getLocale()])">
            {!! __('admin/navigation.add_animal') !!}
        </x-buttons.add-item-button>
    @endcan

    {{-- FOND DU MENU --}}
    <x-admin.navigation.navigation-bottom/>
</div>
