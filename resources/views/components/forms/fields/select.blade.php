@props([
    'field_name',
    'label',
    'name',
    'collection',
    'required' => false,
    'identifier',
    'value'

])

<div {!! $attributes->merge(['class' => 'flex flex-col gap-1']) !!}>
    <label class="text-base pl-3 font-semibold"
        for="{!! $field_name !!}">
        {!! $label !!}
        @if($required)
            <strong class="pl-1 text-red">*</strong>
        @endif
    </label>
    <select class="select_form pl-4 pr-7 py-3 outline bg-gray-50 outline-gray-200 focus:outline-gray-400 rounded-lg font-medium"
            name="{!! $name !!}"
            id="{!! $field_name !!}">
        @foreach ($collection as $item)
            <option value="{!! $item->$identifier !!}" @if($value && $item->$identifier === $value) selected @endif>
                {!! $item->$identifier !!}
            </option>
        @endforeach
    </select>
    @error($name)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
