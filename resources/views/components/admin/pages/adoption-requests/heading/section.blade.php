@props([
    'app_title'
])

<section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

    {{-- FIL D'ARIANE --}}
    <a wire:navigate
       href="{!! route('admin.adoption-requests.index') !!}"
       class="self-start font-bold text-gray-500"
       title="Vers la page des demandes d’adoptions">
        – {!! $app_title !!}
    </a>

    <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
        <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
            <h2 class="text-2xl font-bold">Demandes d’adoptions</h2>
            <p class="text-base text-gray-500">Vous avez actuellement 6 demandes en cours</p>
        </div>

        {{-- ACTIONS --}}
        <x-admin.pages.adoption-requests.heading.actions/>
    </div>

</section>
