<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-semibold">Vos informations</legend>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- Nom de famille --}}
        <x-forms.input-text
            name="last_name"
            id="last_name"
            label="Nom"
            type="text"
            placeholder="Flamant"
            :required="true"
        />

        {{-- Prénom --}}
        <x-forms.input-text
            name="first_name"
            id="first_name"
            label="Prénom"
            type="text"
            placeholder="Lorian"
            :required="true"
        />

        {{-- EMAIL --}}
        <x-forms.input-text
            name="email"
            id="email"
            label="Adresse e-mail"
            type="email"
            placeholder="lorian.flamant@example.be"
            :required="true"
        />

        {{-- CODE POSTAL --}}
        <x-forms.input-number
            name="postal_code"
            id="postal_code"
            label="Code postal"
            type="text"
            placeholder="4000"
            :required="true"
        />

        {{-- ADRESSE --}}
        <x-forms.input-text
            name="location"
            id="location"
            label="Adresse"
            type="text"
            placeholder="Rue du champs, 12"
            :required="true"
        />
    </div>
</fieldset>
