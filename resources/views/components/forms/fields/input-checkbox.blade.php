@props([
    'wire' => '',
    'field_name',
    'name',
    'value' => 1,
    'label'
])

<div class="flex flex-row items-center col-start-1">
    <input wire:model="{{ $wire }}"
        class="peer checkbox hover:cursor-pointer"
           type="checkbox"
           name="{!! $name !!}"
           value="{!! $value !!}"
           id="{!! $field_name !!}">
    <label for="{!! $field_name !!}"
           class="pl-3 hover:cursor-pointer peer-checked:text-black peer-checked:font-medium text-gray-500 transition-all ease-in-out duration-200">
        {!! $label !!}
    </label>
</div>
