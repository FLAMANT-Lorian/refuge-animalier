<section>
    <h2 class="text-lg font-semibold text-red pb-1">{!! __('admin/volunteers.danger_zone_title') !!}</h2>
    <p class="font-base pb-6 text-gray-500">{!! __('admin/volunteers.danger_zone_sub_title') !!}</p>

    <x-forms.buttons.delete
        wire:click="openModal('delete-volunteer')"
        :label="__('admin/volunteers.delete_volunteer')"/>
</section>
