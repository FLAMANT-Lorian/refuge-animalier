<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/settings.delete_avatar_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/settings.delete_avatar_sub_title') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="delete"
                :label="__('admin/settings.delete_avatar_btn')"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
