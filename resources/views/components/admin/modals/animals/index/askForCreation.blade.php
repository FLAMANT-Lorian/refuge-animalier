<x-admin.partials.modal
        :delete_modal="true">

    <x-slot:title>
        {{ __('admin/animals.modal_ask_for_creation_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('forms.field_with') }}<strong class="text-red">*</strong>{{ __('forms.are_required') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div>
            <form wire:submit="askForCreation" class="flex flex-col gap-6">
                <fieldset>
                    <legend class="sr-only">{{ __('admin/animals.modal_ask_for_creation_fieldset') }}</legend>

                    {{-- MESSAGE --}}
                    <x-forms.fields.textarea
                        wire="askToCreateAnimalForm.message"
                        field_name="message"
                        name="message"
                        :label="__('admin/animals.modal_ask_for_creation_fieldset')"
                        :placeholder="__('admin/animals.modal_ask_for_creation_placeholder')"
                        required="true"
                        extra_class="min-h-[12rem]"
                    />
                </fieldset>

                <x-forms.buttons.outlined-button-submit
                    :label="__('admin/animals.modal_ask_for_creation_btn')"/>
            </form>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
