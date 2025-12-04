@props([
    'label'
])

<button {!! $attributes->merge(['class' => 'px-4 py-2.5 font-base rounded-lg text-white trans-all bg-red border border-red hover:bg-transparent hover:text-black hover:cursor-pointer']) !!}>
    {!! $label !!}
</button>
