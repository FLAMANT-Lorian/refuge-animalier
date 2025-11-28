<main class="dashboard" id="content">

    <div class=" px-6 md:px-12 py-10 flex flex-col gap-6">

        {{-- FIL D’ARIANE --}}
        <section class="flex items-start flex-col gap-4">
            <a wire:navigate href="{!! route('admin.dashboard') !!}"
               class="font-bold text-gray-500">| {!! $app_title !!}</a>
            <h2 class="text-2xl font-bold">Tableau de bord</h2>
        </section>

        {{-- ACTIONS RAPIDES --}}
        <x-admin.pages.dashboard.fast-actions/>

        {{-- FICHES ANIMAUX --}}
        <x-admin.pages.dashboard.sheets :sheets="$sheet"/>

        {{-- DEMANDES d’ADOPTIONS --}}
        <x-admin.pages.dashboard.adoption-requests :adoption_requests="$adoptions_requests"/>

        {{-- STATISTIQUES --}}
        <x-admin.pages.dashboard.statistics/>

    </div>
</main>
