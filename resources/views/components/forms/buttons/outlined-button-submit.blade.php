@props([
   'label'
])

<input {!! $attributes->merge(['class' => 'py-3 px-4 border border-green-500 rounded-lg font-base font-medium hover:bg-green-500 hover:text-white transition-all']) !!}
    type="submit"
    value="{!! $label !!}">
