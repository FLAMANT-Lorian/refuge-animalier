@props([
    'name',
    'id',
    'label',
    'type',
    'placeholder',
    'required',
])

<div {!! $attributes->merge(['class' => 'relative flex flex-col gap-1']) !!}>
    <label class="text-base font-semibold pl-3" for="{!! $id !!}">
        {!! $label !!}
        @if($required)
            <strong class="pl-1 text-red">*</strong>
        @endif
    </label>
    <input
        class="focus:outline-gray-400 transition-all px-4 py-3 bg-gray-50 outline outline-gray-200 rounded-lg placeholder:text-gray-500"
        placeholder="{!! $placeholder ?? '' !!}"
        type="{!! $type !!}"
        name="{!! $name !!}"
        id="{!! $id !!}"
        value="{!! old($name) !!}"
        autocomplete="off">
    @error($name)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
