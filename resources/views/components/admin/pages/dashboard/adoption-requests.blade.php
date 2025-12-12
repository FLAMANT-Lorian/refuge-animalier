@props([
    'adoption_request_count' => 6,
    'adoption_requests'
])
<section
    {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h2 class="text-lg font-semibold">
                Demandes d’adoptions
            </h2>
            <p class="font-base font-normal text-gray-500">Vous avez {!! $adoption_request_count !!} nouvelles demandes d’adoptions !</p>
        </div>
        <x-buttons.base
            class="max-lg:self-start"
            :destination="route('admin.adoption-requests.index', config('app.locale'))"
            title="Vers la page des demandes d’adoptions">
            Tout afficher
        </x-buttons.base>
    </div>
    <ul class="sheet_dashboard flex flex-col gap-4 max-h-[21.875rem] overflow-y-scroll">
        @for($i = 0; $i < $adoption_request_count; $i++)
            <x-admin.pages.dashboard.adoption-request-card :data="$adoption_requests"/>
        @endfor
    </ul>
</section>
