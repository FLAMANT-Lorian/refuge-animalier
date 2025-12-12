@php
    use App\Enums\VolunteerStatus;
@endphp

<div
    class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- BOUTON POUR AJOUTER UN BÉNÉVOLE --}}
    <x-buttons.add-item-button
        class="self-start md:order-2 md:ml-auto lg:m-0"
        title="{!! __('admin/volunteers.add_volunteer_btn') !!}"
        :href="route('admin.volunteers.create', config('app.locale'))">
        {!! __('admin/volunteers.add_volunteer_btn') !!}
    </x-buttons.add-item-button>

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="volunteer_search"
        id="volunteer_search"
        :label="__('admin/volunteers.search')"
        :placeholder="__('admin/volunteers.search')"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select-filter
        container_classes="md:order-3"
        :all_selector="true"
        :all_selector_label="__('admin/volunteers.all')"
        id="volunteers_filter"
        :label="__('admin/volunteers.filter')"
        :with_label="false"
        name="volunteers_filter"
        :collection="VolunteerStatus::cases()"
        identifier="value"
    />
</div>
