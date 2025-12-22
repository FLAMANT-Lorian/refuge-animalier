@props([
    'wire' => '',
    'field_name',
    'label',
    'name',
    'collection',
    'required' => false,
    'identifier',
    'id' => null,
    'js_class' => '',
    'traduction' => true

])

<div {!! $attributes->merge(['class' => 'relative flex flex-col gap-1']) !!}>
    <label class="text-base pl-3 font-semibold"
           for="{!! $field_name !!}">
        {!! $label !!}
        @if($required)
            <strong class="pl-1 text-red">*</strong>
        @endif
    </label>
    <select
        wire:model="{{ $wire }}"
        class="{{ $js_class }} cursor-pointer select_form pl-4 pr-7 py-3 outline bg-gray-50 outline-gray-200 focus:outline-gray-400 rounded-lg font-medium"
        name="{!! $name !!}"
        id="{!! $field_name !!}">
        @foreach ($collection as $item)
            <option value="@if($id === null){{ $item->$identifier }}@else{!! $item->$id !!}@endif">
                @if($traduction)
                    {{ __('enum.' . $item->$identifier) }}
                @else
                    {{ $item->$identifier }}
                @endif
            </option>
        @endforeach
    </select>
    @error($wire)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
