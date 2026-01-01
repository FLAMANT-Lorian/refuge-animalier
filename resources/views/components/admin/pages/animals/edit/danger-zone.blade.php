@props([
    'animal'
])

<section>
    <h2 class="text-lg font-semibold text-red pb-1">{!! __('admin/animals.edit_danger_zone_title') !!}</h2>
    <p class="font-base pb-6 text-gray-500">{!! __('admin/animals.edit_danger_zone_subtitle') !!}</p>

    <x-forms.buttons.delete
        wire:click="openModal('delete-animal', {!! $animal->id !!})"
        :label="__('admin/animals.edit_danger_zone_btn')"/>
</section>
