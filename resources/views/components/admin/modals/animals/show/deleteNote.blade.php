@props([
    'note'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/animals.delete_note_modal_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/animals.delete_note_modal_sub_title') . $note->full_name }}&nbsp;?
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="deleteNote({{ $note->id }})"
                label="{{ __('admin/animals.delete_note_modal_btn') }}"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
