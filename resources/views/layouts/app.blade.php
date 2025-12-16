<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Flamant Lorian">
    <meta name="description" content="Site public pour le refuge : Les pattes heureuses">
    <meta name="keywords" content="Animaux, design web, refuge, HEPL">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __($title) ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body x-data="{modalOpen: false}"
      x-on:open-modal.window="modalOpen = true"
      x-on:close-modal.window="modalOpen = false"
      :class="modalOpen ? 'overflow-hidden' : ''"
      class="admin max-w-[120rem] m-auto relative bg-gray-50 has-[.bg-menu:checked]:overflow-hidden lg:flex">

    @if(Route::is('admin.login'))
        <header class="sr-only">Menu login</header>
    @else
        <livewire:admin.partials.header-admin/>
    @endif

    {{ $slot }}

</body>
</html>


