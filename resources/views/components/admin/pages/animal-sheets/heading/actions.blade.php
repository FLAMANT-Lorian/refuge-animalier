@php
    use App\Enums\SheetsStatus;
@endphp

<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="animal-sheets_search"
        id="animal-sheets_search"
        label="Rechercher une fiche"
        placeholder="Rechercher une fiche"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select
        container_classes="md:order-3"
        :all_selector="true"
        all_selector_label="Toutes"
        id="animal-sheets_filter"
        label="Filtrer les fiches"
        :with_label="false"
        name="animal-sheets_filter"
        :collection="SheetsStatus::cases()"
        identifier="value"
    />
</div>
