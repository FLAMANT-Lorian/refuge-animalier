@props([
    'name',
    'id',
    'label',
    'placeholder',
])

<div {!! $attributes->merge(['class' => 'max-w-[15rem] relative']) !!}>
    <label class="sr-only" for="{!! $id !!}">
        {!! $label !!}
    </label>

    <x-icons.search class="absolute fill-transparent right-4 top-1/2 -translate-y-1/2"/>
    <input
        class="w-full items-start bg-white transition-all pl-4 pr-[3.5rem] py-2.5 border border-green-500 rounded-lg placeholder:text-gray-500"
        placeholder="{!! $placeholder ?? '' !!}"
        type="text"
        name="{!! $name !!}"
        id="{!! $id !!}"
        autocomplete="off">
</div>
