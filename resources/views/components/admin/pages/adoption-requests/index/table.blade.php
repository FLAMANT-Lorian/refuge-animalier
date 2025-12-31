@props([
    'adoption_requests'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    @if($adoption_requests->isNotEmpty())

        <table
            class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

            {{-- THEAD --}}
            <x-admin.pages.adoption-requests.index.thead/>

            {{-- TBODY --}}
            <x-admin.pages.adoption-requests.index.tbody :adoption_requests="$adoption_requests"/>
        </table>
    @else
        <x-admin.partials.no-result/>
    @endif

    {{--  PAGINATION --}}
    {!! $adoption_requests->links('vendor.livewire.tailwind', ['results_name' => __('admin/adoption-requests.pagination')]) !!}
</section>
