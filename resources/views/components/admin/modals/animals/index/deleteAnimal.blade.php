@props([
    'animal'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/animals.delete_modal_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/animals.delete_modal_sub_title') . $animal->name }}&nbsp;?
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="delete({{ $animal->id }})"
                label="{{ __('admin/animals.delete_modal_btn') . $animal->name }}"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
