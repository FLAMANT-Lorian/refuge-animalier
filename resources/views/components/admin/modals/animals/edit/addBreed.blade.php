@php
    use App\Enums\Species;
@endphp

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/animals.add_new_breed') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('forms.field_with') }}<strong class="text-red">*</strong>{{ __('forms.are_required') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div>
            <form wire:submit="addBreed" class="flex flex-col gap-6">
                <fieldset class="flex flex-col gap-4">
                    <legend class="sr-only">{{ __('admin/animals.add_new_breed') }}</legend>

                    {{-- ESPECE --}}
                    <x-forms.fields.select
                        wire="breedForm.species"
                        field_name="species"
                        name="species"
                        :label="__('forms.type')"
                        :required="true"
                        :collection="Species::cases()"
                        identifier="value"
                        traduction="true"
                    />

                    {{-- BREED --}}
                    <x-forms.fields.input-text
                        wire="breedForm.breed"
                        field_name="new_breed"
                        name="new_breed"
                        :label="__('forms.breed')"
                        placeholder="Caniche"
                        :required="true"
                    />
                </fieldset>

                <x-forms.buttons.outlined-button-submit
                    label="{{ __('admin/animals.add_new_breed_1') }}"/>

            </form>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
