@props([
    'note'
])

<x-admin.partials.modal>

    <x-slot:title>
        {!! __('admin/animals.edit_note_modal_title') . $note->animal->name !!}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('forms.field_with') }}<strong class="text-red">*</strong>{{ __('forms.are_required') }}
    </x-slot:sub_title>

    <x-slot:body>
        <form novalidate wire:submit="editNote({{ $note->id }})" class="flex flex-col gap-6">
            <fieldset class="flex flex-col gap-6 md:grid md:grid-cols-2">
                <legend class="sr-only">{{ __('admin/animals.edit_note_modal_title') }}</legend>

                <x-forms.fields.input-text
                    wire="editNoteForm.full_name"
                    class="md:col-start-1 md:col-end-2 md:row-start-1"
                    field_name="name"
                    name="name"
                    :label="__('forms.full_name')"
                    placeholder="Dupont Jean"
                    :required="true"/>

                <x-forms.fields.input-text
                    wire="editNoteForm.email"
                    class="md:col-start-1 md:col-end-2 md:row-start-2"
                    field_name="email"
                    name="email"
                    type="email"
                    :label="__('forms.email')"
                    placeholder="jean.dupont@test.com"
                    :required="true"/>

                <x-forms.fields.input-text
                    wire="editNoteForm.visit_date"
                    class="md:col-start-1 md:col-end-2 md:row-start-3"
                    field_name="date"
                    name="date"
                    type="date"
                    :label="__('forms.visit_date')"
                    placeholder="22/07/2025"
                    :required="true"/>

                <x-forms.fields.textarea
                    wire="editNoteForm.message"
                    class="md:col-start-2 md:col-end-3 md:row-start-1 md:row-end-4"
                    field_name="note"
                    name="note"
                    :label="__('forms.note')"
                    :placeholder="__('forms.note_placeholder')"
                    :required="true"/>

            </fieldset>

            <x-forms.buttons.outlined-button-submit
                :label="__('admin/animals.edit_note_modal_title')"/>
        </form>
    </x-slot:body>

</x-admin.partials.modal>
