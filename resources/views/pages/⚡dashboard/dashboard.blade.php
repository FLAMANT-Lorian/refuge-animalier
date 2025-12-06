<main class="dashboard" id="content">

    <div class="px-6 md:px-12 py-12 lg:px-16 lg:py-10 flex flex-col gap-6 lg:grid lg:grid-cols-9">

        {{-- FIL D’ARIANE --}}
        <section
            class="flex items-start flex-col gap-4 lg:col-start-1 lg:col-end-10 lg:p-4 lg:border lg:border-gray-200 lg:rounded-2xl lg:bg-white">
            <a title="Vers le tableau de bord"
               wire:navigate
               href="{!! route('admin.dashboard') !!}"
               class="font-bold text-gray-500">| {!! $app_title !!}</a>
            <h2 class="text-2xl font-bold">Tableau de bord</h2>
        </section>

        {{-- ACTIONS RAPIDES --}}
        <x-admin.pages.dashboard.fast-actions
            class="lg:col-start-1 lg:col-end-4 lg:row-start-2"/>

        {{-- FICHES ANIMAUX --}}
        <x-admin.pages.dashboard.sheets
            class="lg:col-start-1 lg:col-end-6 lg:row-start-3"
            :sheets="$sheet"/>

        {{-- DEMANDES d’ADOPTIONS --}}
        <x-admin.pages.dashboard.adoption-requests
            class="lg:col-start-6 lg:col-end-10 lg:row-start-3"
            :adoption_requests="$adoptions_requests"/>

        {{-- STATISTIQUES --}}
        <x-admin.pages.dashboard.statistics
            class="lg:col-start-4 lg:col-end-10 lg:row-start-2"/>

    </div>

    @if($openEditAnimalSheet)
        <x-admin.modals.dashboard.animal-sheet/>
    @elseif($openAnimalAdoptionRequest)
        <x-admin.modals.dashboard.adoption-request/>
    @endif
</main>
