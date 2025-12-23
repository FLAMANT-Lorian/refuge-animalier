@php
    use App\Enums\AnimalStatus;
    use App\Enums\VolunteerStatus;
    use App\Enums\Sex;
@endphp

@props([
    'animal'
])

<fieldset class="flex flex-col gap-4">
    <legend class="contents text-lg font-medium">{!! __('admin/animals.create_fieldset1_title') !!}</legend>
    <div class="flex flex-col gap-6 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-y-10">

        {{-- NOM --}}
        <x-forms.fields.input-text
            wire="form.name"
            field_name="name"
            name="name"
            :label="__('admin/animals.create_name')"
            :placeholder="__('admin/animals.create_name_placeholder')"
            :required="true"
        />

        {{-- DATE DE NAISSANCE --}}
        <x-forms.fields.input-text
            wire="form.birth_date"
            field_name="birth_date"
            name="birth_date"
            type="date"
            :label="__('admin/animals.create_age')"
            :placeholder="__('admin/animals.create_age_placeholder')"
            :required="true"
        />

        {{-- SEXE --}}
        <x-forms.fields.select
            wire="form.sex"
            class="md:col-start-2 lg:col-start-auto md:col-end-3 lg:col-end-auto md:row-start-3 lg:row-start-auto md:row-end-5 lg:row-end-auto"
            field_name="sex"
            name="sex"
            :label="__('admin/animals.create_sex')"
            :required="true"
            :collection="Sex::cases()"
            identifier="value"
        />

        {{-- RACE -> TODO : CHANGER LE SELECT AVEC LES VALEURS DE DB --}}
        <div class="relative">
            <x-forms.fields.select-animal
                wire="form.breed"
                field_name="breed"
                label="Race"
                :name="__('admin/animals.create_breed')"
                :required="true"
                :traduction="false"
                :collection="$this->breeds"
                identifier="name"
                id="id"
            />
            <button
                wire:click="openModal('add-breed')"
                type="button"
                class="hover:cursor-pointer text-blue-500 hover:underline absolute -bottom-6 max-md:right-0">
                {!! __('admin/animals.add_new_breed') !!}
            </button>
        </div>

        {{-- PELAGE --}}
        <x-forms.fields.input-text
            wire="form.coat"
            field_name="coat"
            name="coat"
            :label="__('admin/animals.create_color')"
            :placeholder="__('admin/animals.create_color_placeholder')"
            :required="true"
        />

        {{-- VACCIN --}}
        <x-forms.fields.input-text
            wire="form.vaccines"
            field_name="vaccines"
            name="vaccines"
            :label="__('admin/animals.create_vaccines')"
            :placeholder="__('admin/animals.create_vaccines_placeholder')"
            :required="true"
        />

        {{-- STATUT --}}
        <x-forms.fields.select
            wire="form.state"
            class="md:col-start-1 lg:col-start-auto md:col-end-3 lg:col-end-auto md:row-start-4 lg:row-start-auto md:row-end-5 lg:row-end-auto"
            field_name="state"
            name="state"
            :label="__('admin/animals.create_status')"
            :required="true"
            :collection="AnimalStatus::cases()"
            identifier="value"
        />

        {{-- CARACTÈRE --}}
        <x-forms.fields.textarea
            wire="form.character"
            class="md:col-start-1 md:col-end-2 md:row-start-5 md:row-end-6 lg:col-start-2 lg:col-end-3 lg:row-start-3 lg:row-end-6"
            field_name="character"
            name="character"
            :label="__('admin/animals.create_character')"
            :placeholder="__('admin/animals.create_character_placeholder')"
            :required="true"/>

        {{-- PHOTOS --}}
        <x-forms.fields.input-file-edit
            wire="form.new_pictures"
            name="pictures"
            container_class="md:col-start-2 md:col-end-3 md:row-start-5 md:row-end-6 lg:col-start-3 lg:col-end-4 lg:row-start-1 lg:row-end-6"
            :label="__('admin/animals.create_picture')"
            :input_content="__('admin/animals.input_content')"
            :multiple="true"
            :animal="$animal"/>

    </div>
</fieldset>
