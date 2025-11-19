@props([
    'destination',
    'title',
])

<a {!! $attributes->merge(['class' => '']) !!} href="{!! $destination !!}" title="{!! $title !!}">
    {!! $slot !!}
</a>
