@php
    use App\Enums\AnimalStatus;
@endphp

<main class="animals_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.animals.index') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}</a>

            <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
                <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
                    <h2 class="text-2xl font-bold">Animaux du refuge</h2>
                    <p class="text-gray-500">Vous avez actuellement 26 animaux dans votre refuge</p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

                    {{-- BOUTON POUR AJOUTER UN ANIMAL --}}
                    <x-buttons.add-item-button
                        class="self-start md:order-2 md:ml-auto lg:m-0"
                        title="Ajouter un animal"
                        :href="route('admin.animals.create')">
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
                    <x-forms.fields.select
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
            </div>

        </section>

        {{-- TABLEAU DES ANIMAUX --}}
        <x-admin.pages.animals.index.table
            class="lg:col-start-1 lg:col-end-10"
            :animals="$this->animals"/>

    </div>
</main>

