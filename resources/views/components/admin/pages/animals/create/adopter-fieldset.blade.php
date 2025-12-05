<fieldset class="pt-6 border-t border-t-gray-200 flex flex-col gap-4">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-medium">Informations sur l’adoptant</legend>
        <p class="text-base text-gray-500">À remplir lors de la procédure d’adoption</p>
    </div>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- NOM DE L’ADOPTANT--}}
        <x-forms.fields.input-text
            field_name="name"
            name="adopter-name"
            label="Nom"
            placeholder="Moka"
            :required="true"
        />

        {{-- EMAIL DE L’ADOPTANT--}}
        <x-forms.fields.input-text
            field_name="email"
            name="adopter-email"
            label="Adresse-mail"
            placeholder="Moka"
            :required="true"
        />

        {{-- ADRESSE DE L’ADOPTANT --}}
        <x-forms.fields.input-text
            field_name="address"
            name="adopter-address"
            label="Adresse"
            placeholder="Rue du&nbsp;&hellip;"
            :required="true"
        />

        {{-- CODE POSTAL DE L’ADOPTANT --}}
        <x-forms.fields.input-number
            field_name="postal_code"
            name="adopter-postal-code"
            label="Code postal"
            placeholder="4000"
            :required="true"
            min_number="0"
        />

        {{-- HEURE DE DÉPART DE L’ANIMAL--}}
        <x-forms.fields.input-text
            field_name="departure_hour"
            type="time"
            name="adopter-departure-hour"
            label="Heure de départ"
            placeholder="Moka"
            :required="true"
        />

        {{-- DATE DE DÉPART DE L’ANIMAL--}}
        <x-forms.fields.input-text
            field_name="departure_date"
            type="date"
            name="adopter-departure-date"
            label="Date de départ"
            placeholder="Moka"
            :required="true"
        />

    </div>

</fieldset>
