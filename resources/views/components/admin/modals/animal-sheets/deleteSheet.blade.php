@props([
    'sheet'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/animal-sheets.delete_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/animal-sheets.delete_sub_title') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="deleteSheet({{ $sheet->id }})"
                label="{{ __('admin/animal-sheets.delete_btn') }}"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
