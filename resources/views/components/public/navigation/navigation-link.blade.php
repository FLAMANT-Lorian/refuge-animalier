@props([
    'destination',
    'title',
    'last'
])

<a class="@if($last)
md:last:py-2.5
md:last:px-4
md:last:bg-green-500
md:last:text-white
md:last:rounded-lg
md:last:hover:font-medium
md:last:hover:bg-transparent
md:last:hover:text-black
md:last:border
md:border-green-500
@endif
text-2xl md:text-base font-normal md:font-medium hover:font-bold active:font-bold transition-all"
   href="{!! $destination !!}" title="{!! $title !!}">
    {!! $slot !!}
</a>
