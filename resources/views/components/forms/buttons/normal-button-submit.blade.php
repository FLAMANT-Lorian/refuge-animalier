@props([
   'label'
])

<input {!! $attributes->merge(['class' => 'hover:cursor-pointer text-white py-3 px-4 border bg-green-500 border-green-500 rounded-lg font-base font-medium hover:bg-transparent hover:text-black transition-all']) !!}
    type="submit"
    value="{!! $label !!}">
