@props([
    'label'
])

<button type="button" {!! $attributes->merge(['class' => 'px-4 py-2.5 font-base font-normal rounded-lg text-white trans-all bg-red border border-red hover:bg-transparent hover:text-black hover:cursor-pointer']) !!}>
    {!! $label !!}
</button>
