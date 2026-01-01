<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/volunteers.delete_avatar_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/volunteers.delete_avatar_sub_title') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="deleteAvatarFromStorage"
                :label="__('admin/volunteers.delete_avatar')"/>
        </div>
    </x-slot:body>

</x-admin.partials.modal>
