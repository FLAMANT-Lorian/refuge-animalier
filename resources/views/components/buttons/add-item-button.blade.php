@props([
    'href',
    'title'
])

<a wire:navigate
   {!! $attributes->merge(['class' => 'group flex gap-2 justify-center items-center px-4 py-2.5 border border-green-500 rounded-lg hover:bg-green-500 hover:text-white transition-all ease-in-out duration-200']) !!}
   title="{!! $title !!}"
   href="{!! $href !!}">
    {!! $slot !!}
    <x-icons.add class="fill-black group-hover:fill-white"/>
</a>
