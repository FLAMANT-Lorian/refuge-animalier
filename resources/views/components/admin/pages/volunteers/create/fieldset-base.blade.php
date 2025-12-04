@php
    use App\Enums\VolunteerStatus;
@endphp

<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">Informations sur le bénévole</legend>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- Nom de famille --}}
        <x-forms.fields.input-text
            field_name="last_name"
            name="last_name"
            label="Nom"
            placeholder="Flamant"
            required="true"
        />

        {{-- Prénom --}}
        <x-forms.fields.input-text
            field_name="first_name"
            name="first_name"
            label="Prénom"
            placeholder="Lorian"
            required="true"
        />

        {{-- EMAIL --}}
        <x-forms.fields.input-text
            type="email"
            field_name="email"
            name="email"
            label="Adresse e-mail"
            placeholder="lorian.flamant@example.be"
            :required="true"
        />

        {{-- CODE POSTAL --}}
        <x-forms.fields.input-number
            field_name="postal_code"
            name="postal_code"
            label="Code postal"
            min_number="0"
            placeholder="4000"
        />

        {{-- ADRESSE --}}
        <x-forms.fields.input-text
            field_name="location"
            name="location"
            label="Adresse"
            placeholder="Rue du champs, 12"
        />

        {{-- STATUT --}}
        <x-forms.fields.select
            field_name="volunteer_status"
            label="Statut du bénévole"
            name="volunteer_status"
            :value="VolunteerStatus::Active->value"
            :required="true"
            :collection="VolunteerStatus::cases()"
            identifier="value"
        />

    </div>
</fieldset>
