<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Flamant Lorian">
    <meta name="description" content="Site public pour le refuge : Les pattes heureuses">
    <meta name="keywords" content="Animaux, design web, refuge, HEPL">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! $title !!}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    {{--Header--}}
    <x-layouts.partials.header />

    {!! $slot !!}

    <x-layouts.partials.footer />
</body>
</html>
