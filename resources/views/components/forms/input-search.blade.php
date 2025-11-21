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

    <svg class="absolute fill-transparent right-4 top-1/2 -translate-y-1/2"
        width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path d="M16.927 17.04L20.4001 20.4M19.2801 11.44C19.2801 15.7699 15.77 19.28 11.4401 19.28C7.11019 19.28 3.6001 15.7699 3.6001 11.44C3.6001 7.11006 7.11019 3.59998 11.4401 3.59998C15.77 3.59998 19.2801 7.11006 19.2801 11.44Z" stroke="#57A770" stroke-width="2" stroke-linecap="round"/>
    </svg>

    <input
        class="w-full items-start bg-white transition-all pl-4 pr-[3.5rem] py-3 outline outline-green-500 rounded-lg placeholder:text-gray-500"
        placeholder="{!! $placeholder ?? '' !!}"
        type="text"
        name="{!! $name !!}"
        id="{!! $id !!}"
        autocomplete="off">
</div>
