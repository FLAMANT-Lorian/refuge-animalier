<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Flamant Lorian">
    <meta name="description" content="Site public pour le refuge : Les pattes heureuses">
    <meta name="keywords" content="Animaux, design web, refuge, HEPL">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{!! __('admin/page_title.login') !!}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin login overflow-hidden">
    {!! $slot !!}
</body>
</html>
