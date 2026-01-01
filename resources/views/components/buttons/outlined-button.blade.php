@props([
    'destination',
    'title'
])

<a wire:navigate class="trans-all font-medium px-4 py-2.5 rounded-lg border border-green-500 hover:bg-green-500 hover:text-white"
   href="{!! $destination !!}" title="{!! $title !!}">
    {!! $slot !!}
</a>
