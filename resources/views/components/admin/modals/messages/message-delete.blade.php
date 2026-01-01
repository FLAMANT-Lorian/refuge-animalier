@props([
    'message'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/messages.delete_modal') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/messages.delete_modal_sub_title') . $message->full_name }}&nbsp;?
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="deleteMessage({{ $message->id }})"
                label="{{ __('admin/messages.delete_modal_btn') }}"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
