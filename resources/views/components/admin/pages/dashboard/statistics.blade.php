@php
    use \App\Enums\DateRange;
@endphp

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col md:flex-row gap-4">
        <h2 class="text-lg font-semibold">
            Statistiques
        </h2>
        <x-buttons.download-button
            class="md:ml-auto"
            destination="#"
            title="Télécharger le rapport d’activité">
            Télécharger le rapport d’activité
        </x-buttons.download-button>
        <x-forms.fields.select
            :all_selector="false"
            id="stats_filter"
            name="stats_filter"
            label="Séléctionner le filtre"
            :with_label="false"
            :collection="DateRange::cases()"
            identifier="value"/>
    </div>

    {{-- GRAPHIQUES --}}
    <x-admin.pages.dashboard.statistics-cards/>
</section>
