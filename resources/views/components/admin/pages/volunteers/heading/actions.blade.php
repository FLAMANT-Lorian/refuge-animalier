@php
    use App\Enums\VolunteerStatus;
@endphp

<div
    class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- BOUTON POUR AJOUTER UN BÉNÉVOLE --}}
    <x-buttons.add-item-button
        class="self-start md:order-2 md:ml-auto lg:m-0"
        title="Ajouter un bénévole"
        :href="route('admin.volunteers.create')">
        Ajouter un bénévole
    </x-buttons.add-item-button>

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="volunteer_search"
        id="volunteer_search"
        label="Rechercher un bénévole"
        placeholder="Rechercher un bénévole"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select
        container_classes="md:order-3"
        :all_selector="true"
        all_selector_label="Tous"
        id="volunteers_filter"
        label="Filtrer les Bénévoles"
        :with_label="false"
        name="volunteers_filter"
        :collection="VolunteerStatus::cases()"
        identifier="value"
    />
</div>
