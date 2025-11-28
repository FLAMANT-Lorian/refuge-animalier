@props([
    'id',
    'label',
    'with_label',
    'name',
    'collection',
    'identifier'

])

<div>
    <label class="{!! $with_label ? '' : 'sr-only' !!}" for="{!! $id !!}">{!! $label !!}</label>
    <select {!! $attributes->merge(['class' => 'select_form']) !!}
        name="{!! $name !!}"
        id="{!! $id !!}">
        @foreach ($collection as $item)
            <option value="{!! $item->$identifier !!}">
                {!! $item->$identifier !!}
            </option>
        @endforeach
    </select>
    @error($name)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
