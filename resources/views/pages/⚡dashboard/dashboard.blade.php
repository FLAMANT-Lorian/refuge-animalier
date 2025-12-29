@php use App\Models\AdoptionRequest;use App\Models\AnimalSheet; @endphp
<main class="flex-1 dashboard" id="content">

    <div class="px-6 md:px-12 py-12 lg:px-16 lg:py-10 flex flex-col gap-6 lg:grid lg:grid-cols-9">

        {{-- FIL D’ARIANE --}}
        <section
            class="flex items-start flex-col gap-4 lg:col-start-1 lg:col-end-10 lg:p-4 lg:border lg:border-gray-200 lg:rounded-2xl lg:bg-white">
            <a title="{!! __('admin/dashboard.breadcrumb_title') !!}"
               wire:navigate
               href="{!! route('admin.dashboard', config('app.locale')) !!}"
               class="font-bold text-gray-500">
                – {!! __('admin/dashboard.breadcrumb_text') !!}
            </a>
            <h2 class="text-2xl font-bold">{!! __('admin/dashboard.breadcrumb_text') !!}</h2>
        </section>

        {{-- ACTIONS RAPIDES --}}
        <x-admin.pages.dashboard.fast-actions
            class="lg:col-start-1 lg:col-end-4 lg:row-start-2"/>

        @can('view-any', AnimalSheet::class)
            {{-- FICHES ANIMAUX --}}
            <x-admin.pages.dashboard.sheets
                class="lg:col-start-1 lg:col-end-6 lg:row-start-3"/>
        @endcan

        @if(auth()->user()->isAdmin())

            {{-- DEMANDES d’ADOPTIONS --}}
            <x-admin.pages.dashboard.adoption-requests
                class="lg:col-start-6 lg:col-end-10 lg:row-start-3"/>
        @endif
        {{-- STATISTIQUES --}}
        <livewire:admin.pages.dashboard.stats
            class="lg:col-start-4 lg:col-end-10 lg:row-start-2"/>

    </div>

    @if($openEditAnimalSheet)
        <x-admin.modals.animal-sheets.animal-sheet
            :sheet="$sheetToSee"/>
    @endif
</main>
