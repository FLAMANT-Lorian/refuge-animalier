@props([
    'adoption_requests'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <table class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

        {{-- THEAD --}}
        <x-admin.pages.adoption-requests.index.thead/>

        {{-- TBODY --}}
        <x-admin.pages.adoption-requests.index.tbody :adoption_requests="$adoption_requests"/>
    </table>

    {{--  PAGINATION --}}
    {{--{!! $volunteers->links('vendor.livewire.tailwind', ['results_name' => '$volunteers']) !!}--}}
</section>
