@php
    use App\Enums\VolunteerStatus;
@endphp

<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">{!! __('admin/volunteers.fieldset2_legend') !!}</legend>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- Nom de famille --}}
        <x-forms.fields.input-text
            field_name="last_name"
            name="last_name"
            value="Flamant"
            :label="__('admin/volunteers.name')"
            :placeholder="__('admin/volunteers.last_name_placeholder')"
            required="true"
        />

        {{-- Prénom --}}
        <x-forms.fields.input-text
            field_name="first_name"
            name="first_name"
            value="Lorian"
            :label="__('admin/volunteers.first_name')"
            :placeholder="__('admin/volunteers.first_name_placeholder')"
            required="true"
        />

        {{-- EMAIL --}}
        <x-forms.fields.input-text
            type="email"
            field_name="email"
            name="email"
            value="lorian.flamant@example.be"
            :label="__('admin/volunteers.email')"
            :placeholder="__('admin/volunteers.create_email_placeholder')"
            :required="true"
        />

        {{-- CODE POSTAL --}}
        <x-forms.fields.input-number
            field_name="postal_code"
            name="postal_code"
            value="4000"
            :label="__('admin/volunteers.postal_code')"
            min_number="0"
            :placeholder="__('admin/volunteers.postal_code_placeholder')"
        />

        {{-- ADRESSE --}}
        <x-forms.fields.input-text
            field_name="location"
            name="location"
            value="Rue du champs, 12"
            :label="__('admin/volunteers.location')"
            :placeholder="__('admin/volunteers.location_placeholder')"
        />

        {{-- STATUT --}}
        <x-forms.fields.select
            field_name="volunteer_status"
            :label="__('admin/volunteers.status')"
            name="volunteer_status"
            :value="VolunteerStatus::Parts->value"
            :required="true"
            :collection="VolunteerStatus::cases()"
            identifier="value"
        />

    </div>
</fieldset>
