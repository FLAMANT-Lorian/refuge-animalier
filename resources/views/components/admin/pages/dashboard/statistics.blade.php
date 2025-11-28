@php
    use \App\Enums\DateRange;
@endphp

<section class="flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white">
    <div class="flex flex-col gap-4">
        <h2 class="text-lg font-semibold">
            Statistiques
        </h2>
        <x-buttons.download-button
            destination="#"
            title="Télécharger le rapport d’activité">
            Télécharger le rapport d’activité
        </x-buttons.download-button>
        <x-forms.select
            class="px-2 py-2.5 border border-green-500 rounded-lg font-medium"
            id="stats_filter"
            name="stats_filter"
            label="Séléctionner le filtre"
            :with_label="false"
            :collection="DateRange::cases()"
            identifier="value"/>
    </div>

    {{-- LÉGENDE STATISTIQUES --}}
    <x-admin.pages.dashboard.statistics-legend/>

    {{-- GRAPHIQUES --}}
    <x-admin.pages.dashboard.statistics-charts/>
</section>
