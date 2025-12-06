@php
    use App\Enums\AnimalStatus;
    use App\Enums\VolunteerStatus;
@endphp

@props([
    'animal'
])
<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-medium">Informations sur l’animal</legend>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- NOM --}}
        <x-forms.fields.input-text
            field_name="name"
            name="name"
            label="Nom"
            :value="$animal->name"
            placeholder="Moka"
            :required="true"
        />

        {{-- AGE --}}
        <x-forms.fields.input-number
            field_name="age"
            name="age"
            label="Age"
            :value="$animal->age"
            placeholder="3"
            :required="true"
            min_number="0"
        />

        {{-- SEXE --}}
        <x-forms.fields.input-text
            field_name="sex"
            name="sex"
            label="Sexe"
            :value="$animal->sex"
            placeholder="Femelle"
            :required="true"
            min_number="0"
        />

        {{-- RACE -> TODO : CHANGER LE SELECT AVEC LES VALEURS DE DB --}}
        <div class="relative">
            <x-forms.fields.select
                field_name="breed"
                label="Race"
                name="breed"
                :value="VolunteerStatus::Active->value"
                :required="true"
                :collection="VolunteerStatus::cases()"
                identifier="value"
            />
            <button type="button" class="text-blue-500 hover:underline absolute -bottom-6 max-md:right-0">
                Ajouter une nouvelle espèce
            </button>
        </div>

        {{-- PELAGE --}}
        <x-forms.fields.input-text
            field_name="color"
            name="color"
            label="Pelage"
            :value="$animal->color"
            placeholder="brun"
            :required="true"
        />

        {{-- VACCIN --}}
        <x-forms.fields.input-text
            field_name="vaccines"
            name="vaccines"
            label="Vaccins"
            :value="$animal->vaccines"
            placeholder="Rage,&nbsp;&hellip;"
            :required="true"
        />

        {{-- STATUT --}}
        <x-forms.fields.select
            class="md:col-start-1 lg:col-start-auto md:col-end-3 lg:col-end-auto md:row-start-4 lg:row-start-auto md:row-end-5 lg:row-end-auto"
            field_name="state"
            name="state"
            label="Statut"
            :value="$animal->status"
            :required="true"
            :collection="AnimalStatus::cases()"
            identifier="value"
        />

        {{-- CARACTÈRE --}}
        <x-forms.fields.textarea
            class="md:col-start-1 md:col-end-2 md:row-start-5 md:row-end-6 lg:col-start-2 lg:col-end-3 lg:row-start-3 lg:row-end-6"
            field_name="character"
            name="character"
            label="Caractère"
            :value="$animal->description"
            placeholder="Doux&hellip;"
            :required="true"/>

        {{-- PHOTOS --}}
        <x-forms.fields.input-file
            container_class="md:col-start-2 md:col-end-3 md:row-start-5 md:row-end-6 lg:col-start-3 lg:col-end-4 lg:row-start-1 lg:row-end-6"
            label="Photos de l’animal"
            input_content="Choisir des images&nbsp;&hellip;"
            :multiple="true"/>

    </div>
</fieldset>
