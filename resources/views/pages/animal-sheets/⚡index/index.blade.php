@php
    use App\Enums\SheetsStatus;
@endphp

<main class="messages_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.animal-sheets.index') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}</a>

            <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
                <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
                    <h2 class="text-2xl font-bold">Gestion des fiches</h2>
                    <p class="text-gray-500">Il vous reste 13 fiches à valider</p>
                </div>

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
            </div>

        </section>

        {{-- TABLEAU DES FiCHES --}}
        <x-admin.pages.animal-sheets.index.table
            class="lg:col-start-1 lg:col-end-10"
            :animal_sheets="$this->animal_sheets"/>

    </div>
</main>


