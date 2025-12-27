@props([
    'adoption_request'
])

<section>
    <h2 class="text-lg font-semibold text-red pb-1">{!! __('admin/adoption-requests.delete_modal_btn') !!}</h2>
    <p class="font-base pb-6 text-gray-500">{!! __('admin/adoption-requests.edit_danger_zone_subtitle') !!}</p>

    <x-forms.buttons.delete
        wire:click="openModal('delete-adoption-request', {!! $adoption_request->id !!})"
        :label="__('admin/adoption-requests.delete_modal_btn')"/>
</section>

