@props([
    'volunteer'
])

<x-admin.partials.modal
    :delete_modal="true">

    <x-slot:title>
        {{ __('admin/volunteers.delete_volunteer_title') }}
    </x-slot:title>

    <x-slot:sub_title>
        {{ __('admin/volunteers.delete_volunteer_sub_title') }}
    </x-slot:sub_title>

    <x-slot:body>
        <div class="flex justify-end">
            <x-forms.buttons.delete
                wire:click="deleteVolunteer({{ $volunteer->id }})"
                :label="__('admin/volunteers.delete_volunteer_title')"
            />
        </div>
    </x-slot:body>

</x-admin.partials.modal>
