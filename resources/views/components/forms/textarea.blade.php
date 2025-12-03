@props([
    'field_name',
    'name',
    'label',
    'value',
    'placeholder',
    'required' => false
])

<div {!! $attributes->merge(['class' => 'relative flex flex-col gap-1']) !!}>
    <label class="text-base font-semibold pl-3" for="{!! $field_name !!}">
        {!! $label !!}
        @if ($required)
            <strong class="pl-1 text-red">*</strong>
        @endif
    </label>

    <textarea
        class="h-[12rem] max-h-[15rem] focus:outline-gray-400 transition-all px-4 py-3 bg-gray-50 outline outline-gray-200 rounded-lg placeholder:text-gray-500"
        placeholder="{!! $placeholder ?? '' !!}"
        name="{!! $name !!}"
        id="{!! $field_name !!}"
        autocomplete="off"
    >{!! $value ?? old($name) !!}</textarea>
    @error($name)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
