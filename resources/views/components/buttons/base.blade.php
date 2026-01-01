@props([
    'destination',
    'title'
])

<a wire:navigate
   {!! $attributes->merge(['class' => 'text-center font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all']) !!}
   href="{!! $destination !!}"
   title="{!! $title !!}">
    {!! $slot !!}
</a>
