<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="admin max-w-[110rem] m-auto relative bg-gray-50 has-[.bg-menu:checked]:overflow-hidden lg:flex">

    @if(url()->current() === route('admin.login'))
        <header class="sr-only">Menu login</header>
    @else
        <livewire:admin.partials.header-admin />
    @endif

    {{ $slot }}

    @livewireScripts
</body>
</html>
