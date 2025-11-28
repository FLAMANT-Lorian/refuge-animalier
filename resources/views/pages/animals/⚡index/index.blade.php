@php
    use App\Enums\AnimalStatus;
@endphp

<main class="animals_index flex-1" id="content">

    <div class="px-6 py-12">

        {{-- EN TÊTE --}}
        <section class="flex flex-col gap-6">

            <div class="flex flex-col gap-2">
                <a wire:navigate href="{!! route('admin.animals.index') !!}"
                   class="font-bold text-gray-500">| {!! $app_title !!}</a>
                <h2 class="text-2xl font-bold">Animaux du refuge</h2>
            </div>

            <div class="flex flex-col gap-4">

                {{-- BOUTON POUR AJOUTER UN ANIMAL --}}
                <x-buttons.add-item-button
                    class="self-start"
                    title="Ajouter un animal"
                    :href="route('admin.animals.create')">
                    Ajouter un animal
                </x-buttons.add-item-button>

                {{-- CHAMPS DE RECHERCHE --}}
                <x-forms.input-search
                    name="animal_search"
                    id="animal_search"
                    label="Rechercher un animal"
                    placeholder="Rechercher un animal"
                />

                {{-- SELECTION DES FILTRES --}}
                <x-forms.select
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

        </section>

        {{-- TABLEAU DES ANIMAUX --}}
        <x-admin.pages.animals.index.table :animals="$this->animals"/>

    </div>
</main>

