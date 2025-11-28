@props([
    'sheets_count' => 6,
    'sheets'
])
<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h2 class="text-lg font-semibold">
                Gestion des fiches
            </h2>
            <p class="font-base font-normal text-gray-500">Il vous reste {!! $sheets_count !!} fiches à valider !</p>
        </div>
        <x-buttons.base
            class="max-md:self-start"
            :destination="route('admin.animal-sheets.index')" title="Vers la page des fiches des animaux">
            Tout afficher
        </x-buttons.base>
    </div>
    <ul class="sheet_dashboard flex flex-col gap-4 max-h-[21.875rem] overflow-y-scroll">
        @for($i = 0; $i < $sheets_count; $i++)
            <x-admin.pages.dashboard.sheets-card :data="$sheets"/>
        @endfor
    </ul>
</section>
