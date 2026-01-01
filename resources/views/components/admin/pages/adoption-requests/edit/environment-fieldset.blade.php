@php
    use App\Enums\AnimalStatus;
    use App\Enums\VolunteerStatus;
    use App\Enums\AdoptionRequestsStatus;
    use App\Enums\YesOrNo;
@endphp

<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-medium">{{ __('admin/adoption-requests.environment') }}</legend>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- Type de logement --}}
        <x-forms.fields.input-text
            wire="form.housing"
            field_name="housing"
            name="housing"
            :label="__('admin/adoption-requests.housing')"
            :placeholder="__('admin/adoption-requests.housing_placeholder')"
        />

        {{-- Espace extérieur --}}
        <x-forms.fields.select
            wire="form.outside_area"
            class="row-start-2 row-end-3 col-start-1 col-end-2"
            field_name="outdoor_area"
            name="outdoor_area"
            :label="__('admin/adoption-requests.outdoor_area')"
            :collection="YesOrNo::cases()"
            identifier="value"
        />

        {{-- ENFANT --}}
        <x-forms.fields.select
            wire="form.children_at_home"
            field_name="children"
            name="children"
            :label="__('admin/adoption-requests.children')"
            :collection="YesOrNo::cases()"
            identifier="value"
        />

        {{-- Nombre d’enfant --}}
        <x-forms.fields.input-number
            wire="form.children_count"
            field_name="children_count"
            name="children_count"
            :label="__('admin/adoption-requests.children_count')"
            :placeholder="__('admin/adoption-requests.children_count_placeholder')"
            min_number="0"
        />

        {{-- Présence d’animaux --}}
        <x-forms.fields.select
            wire="form.animals_at_home"
            field_name="animals_at_home"
            name="animals_at_home"
            :label="__('admin/adoption-requests.animals_at_home')"
            :collection="YesOrNo::cases()"
            identifier="value"
        />

        {{-- type d’animaux --}}
        <x-forms.fields.input-text
            wire="form.animals_type"
            field_name="animals_type"
            name="animals_type"
            :label="__('admin/adoption-requests.animals_at_home_type')"
            :placeholder="__('admin/adoption-requests.animals_at_home_type_placeholder')"
        />

    </div>
</fieldset>
