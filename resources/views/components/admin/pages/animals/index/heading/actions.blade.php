@php
    use App\Enums\AnimalStatus;
@endphp

<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- BOUTON POUR AJOUTER UN ANIMAL --}}
    <x-buttons.add-item-button
        class="self-start md:order-2 md:ml-auto lg:m-0"
        title="Ajouter un animal"
        :href="route('admin.animals.create', config('app.locale'))">
        Ajouter un animal
    </x-buttons.add-item-button>

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="animal_search"
        id="animal_search"
        label="Rechercher un animal"
        placeholder="Rechercher un animal"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select-filter
        container_classes="md:order-3"
        :all_selector="true"
        all_selector_label="Tous"
        id="animals_filter"
        label="Filtrer les animaux"
        :with_label="false"
        name="animals_filter"
        :collection="AnimalStatus::cases()"
        identifier="value"
    />
</div>
