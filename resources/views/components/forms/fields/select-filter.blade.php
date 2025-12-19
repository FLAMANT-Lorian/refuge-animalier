@props([
    'id',
    'label',
    'with_label',
    'name',
    'collection',
    'required' => false,
    'identifier',
    'all_selector' => false,
    'all_selector_label',
    'container_classes' => ''

])

<div class="{!! $container_classes !!}">
    <label class="{!! $with_label ? '' : 'sr-only' !!}" for="{!! $id !!}">{!! $label !!} @if($required)
            <strong class="text-red">*</strong>
        @endif</label>
    <select
        {!! $attributes->merge(['class' => 'hover:cursor-pointer select_form pl-2 pr-7 py-2.5 border border-green-500 rounded-lg font-medium']) !!}
        name="{!! $name !!}"
        id="{!! $id !!}">
        @if($all_selector)
            <option value="all">
                {!! $all_selector_label !!}
            </option>
        @endif
        @foreach ($collection as $item)
            <option value="{!! $item->$identifier !!}">
                {!! __('enum.' . $item->$identifier . '_filter') !!}
            </option>
        @endforeach
    </select>
    @error($name)
    <p class="absolute -bottom-5 text-red text-sm font-semibold">{!! $message !!}</p>
    @enderror
</div>
