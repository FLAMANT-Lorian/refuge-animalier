@props([
    'animals'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    @if($animals->isNotEmpty())
        <table
            class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

            {{-- THEAD --}}
            <x-admin.pages.animals.index.thead/>

            {{-- TBODY --}}
            <x-admin.pages.animals.index.tbody :animals="$animals"/>
        </table>
    @else
        <x-admin.partials.no-result/>
    @endif

    {{--  PAGINATION --}}
    {!! $animals->links('vendor.livewire.tailwind', ['results_name' => __('admin/animals.pagination')]) !!}
</section>
