@php
    use App\Enums\AnimalStatus;
    use App\Enums\VolunteerStatus;
    use App\Enums\AdoptionRequestsStatus;
    use App\Enums\YesOrNo;
@endphp

<fieldset class="flex flex-col gap-4 border-t border-t-gray-200 pt-6">
    <legend class="contents text-lg font-medium">{{ __('admin/adoption-requests.environment') }}</legend>
    <div x-data="{children_available : false}" class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- Type de logement --}}
        <x-forms.fields.input-text
            field_name="housing"
            name="housing"
            :label="__('admin/adoption-requests.housing')"
            :placeholder="__('admin/adoption-requests.housing_placeholder')"
        />

        {{-- Espace extérieur --}}
        <x-forms.fields.select
            class="lg:row-start-2 lg:row-end-3 lg:col-start-1 lg:col-end-2"
            field_name="outdoor_area"
            name="outdoor_area"
            :label="__('admin/adoption-requests.outdoor_area')"
            :collection="YesOrNo::cases()"
            identifier="value"
            :value="YesOrNo::No->value"
        />

        {{-- ENFANT --}}
        <x-forms.fields.select
            js_class="children_select"
            field_name="children"
            name="children"
            :label="__('admin/adoption-requests.children')"
            :collection="YesOrNo::cases()"
            identifier="value"
            :value="YesOrNo::No->value"
        />

        {{-- Nombre d’enfant -> SI ENFANT = YES--}}
        <x-forms.fields.input-number
            js_class="children_number"
            class=""
            field_name="children_count"
            name="children_count"
            :label="__('admin/adoption-requests.children_count')"
            :placeholder="__('admin/adoption-requests.children_count_placeholder')"
            min_number="0"
        />

        {{-- Présence d’animaux --}}
        <x-forms.fields.select
            js_class="animals_select"
            field_name="animals_at_home"
            name="animals_at_home"
            :label="__('admin/adoption-requests.animals_at_home')"
            :collection="YesOrNo::cases()"
            identifier="value"
            :value="YesOrNo::No->value"
        />

        {{-- type d’animaux -> Si Animaux = YES--}}
        <x-forms.fields.input-text
            js_class="animals_number"
            field_name="animals_type"
            name="animals_type"
            :label="__('admin/adoption-requests.animals_at_home_type')"
            :placeholder="__('admin/adoption-requests.animals_at_home_type_placeholder')"
        />

    </div>
</fieldset>
