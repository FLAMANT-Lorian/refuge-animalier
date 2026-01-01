@props([
    'animal_sheets'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <h2 class="sr-only">Index des fiches des animaux</h2>
    @if($animal_sheets->isNotEmpty())
        <table
            class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

            {{-- THEAD --}}
            <x-admin.pages.animal-sheets.index.thead/>

            {{-- TBODY --}}
            <x-admin.pages.animal-sheets.index.tbody :animal_sheets="$animal_sheets"/>

        </table>
    @else
        <x-admin.partials.no-result/>
    @endif

    {{--  PAGINATION --}}
    {!! $animal_sheets->links('vendor.livewire.tailwind', ['results_name' => __('admin/animal-sheets.paginator')]) !!}
</section>
