@props([
    'app_title'
])

<section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

    {{-- FIL D'ARIANE --}}
    <a wire:navigate
       title="Vers la page des fiches des animaux"
       href="{!! route('admin.animal-sheets.index', config('app.locale')) !!}"
       class="self-start font-bold text-gray-500">
        – {!! $app_title !!}
    </a>

    <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
        <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
            <h2 class="text-2xl font-bold">Gestion des fiches</h2>
            <p class="text-base text-gray-500">Il vous reste 13 fiches à valider</p>
        </div>

        {{-- ACTIONS --}}
        <x-admin.pages.animal-sheets.heading.actions/>
    </div>

</section>
