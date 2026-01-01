@props([
    'adoption_request'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/adoption-requests.delete_modal_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/adoption-requests.delete_modal_sub_title') . $adoption_request->full_name }}&nbsp;?
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="delete({{ $adoption_request->id }})"
                label="{{ __('admin/adoption-requests.delete_modal_btn') }}"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
