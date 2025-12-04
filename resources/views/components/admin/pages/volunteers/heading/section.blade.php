@props([
    'app_title'
])

<section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

    {{-- FIL D'ARIANE --}}
    <a wire:navigate href="{!! route('admin.volunteers.index') !!}"
       class="self-start font-bold text-gray-500">| {!! $app_title !!}</a>

    <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
        <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
            <h2 class="text-2xl font-bold">Bénévoles</h2>
            <p class="text-gray-500">Votre refuge comporte 12 bénévoles !</p>
        </div>

        {{-- ACTIONS --}}
        <x-admin.pages.volunteers.heading.actions/>
    </div>

</section>
