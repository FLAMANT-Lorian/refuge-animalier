@props([
    'destination',
    'title',
    'last' => false
])

<a class="
@if($last)
md:last:py-2.5
md:last:px-4
md:last:text-white
md:last:bg-green-500
md:last:rounded-lg
md:last:hover:font-normal
md:last:hover:bg-transparent
md:last:border
md:last:hover:border-green-500
md:last:hover:text-black
@endif
text-2xl md:text-base font-normal hover:font-bold active:font-bold transition-all"
   href="{!! $destination !!}" title="{!! $title !!}">
    {!! $slot !!}
</a>
