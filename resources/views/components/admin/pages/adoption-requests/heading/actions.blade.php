@php
    use App\Enums\AdoptionRequestsStatus;
@endphp

<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="adoption-requests_search"
        id="adoption-requests_search"
        :label="__('admin/adoption-requests.search_field')"
        :placeholder="__('admin/adoption-requests.search_field')"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select-filter
        container_classes="md:order-3"
        :all_selector="true"
        :all_selector_label="__('admin/adoption-requests.all')"
        id="adoption-requests_filter"
        :label="__('admin/adoption-requests.filter_field')"
        :with_label="false"
        name="adoption-requests_filter"
        :collection="AdoptionRequestsStatus::cases()"
        identifier="value"
    />
</div>
