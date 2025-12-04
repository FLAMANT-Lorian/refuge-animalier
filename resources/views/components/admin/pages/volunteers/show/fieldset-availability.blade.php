<fieldset class="flex flex-col gap-4 pt-6 border-t border-t-gray-200">
    <legend class="contents text-lg font-semibold">Disponibilité du bénévole</legend>
    <div class="grid grid-cols-2 md:grid-cols-3 min-[68.75rem]:grid-cols-7 gap-6">

        {{-- LUNDI --}}
        <x-forms.fields.input-text
            field_name="monday"
            name="monday"
            label="Lundi"
            placeholder="12h30 - 16h30"
        />

        {{-- MARDI --}}
        <x-forms.fields.input-text
            field_name="tuesday"
            name="tuesday"
            label="Mardi"
            placeholder="12h30 - 16h30"
        />

        {{-- MERCREDI --}}
        <x-forms.fields.input-text
            field_name="wednesday"
            name="wednesday"
            label="Mercredi"
            placeholder="12h30 - 16h30"
        />

        {{-- JEUDI --}}
        <x-forms.fields.input-text
            field_name="thursday"
            name="thursday"
            label="Jeudi"
            placeholder="12h30 - 16h30"
        />

        {{-- VENDREDI --}}
        <x-forms.fields.input-text
            field_name="friday"
            name="friday"
            label="Vendredi"
            placeholder="12h30 - 16h30"
        />

        {{-- SAMEDI --}}
        <x-forms.fields.input-text
            field_name="saturday"
            name="saturday"
            label="Samedi"
            placeholder="12h30 - 16h30"
        />

        {{-- DIMANCHE --}}
        <x-forms.fields.input-text
            field_name="sunday"
            name="sunday"
            label="Dimanche"
            placeholder="12h30 - 16h30"
        />

    </div>
</fieldset>
