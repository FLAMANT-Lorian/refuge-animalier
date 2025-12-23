@php
    use App\Enums\AnimalStatus;
    use App\Models\Animal;
@endphp

<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    @can('create', Animal::class)
        {{-- BOUTON POUR AJOUTER UN ANIMAL --}}
        <x-buttons.add-item-button
            class="self-start md:order-2 md:ml-auto lg:m-0"
            title="{!! __('admin/animals.add_animal_title') !!}"
            :href="route('admin.animals.create', config('app.locale'))">
            {!! __('admin/animals.add_animal_text') !!}
        </x-buttons.add-item-button>
    @endcan

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="animal_search"
        id="animal_search"
        :label="__('admin/animals.search_animal_text')"
        :placeholder="__('admin/animals.search_animal_placeholder')"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select-filter
        container_classes="md:order-3"
        :all_selector="true"
        :all_selector_label="__('admin/animals.filter_animal_all_selector')"
        id="animals_filter"
        :label="__('admin/animals.filter_animal_text')"
        :with_label="false"
        name="animals_filter"
        :collection="AnimalStatus::cases()"
        identifier="value"
    />
</div>
