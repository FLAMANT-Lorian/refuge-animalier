@props([
    'volunteers'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <table class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

        {{-- THEAD --}}
        <x-admin.pages.volunteers.index.thead/>

        {{-- TBODY --}}
        <x-admin.pages.volunteers.index.tbody :volunteers="$volunteers"/>
    </table>

    {{--  PAGINATION --}}
    {{--{!! $volunteers->links('vendor.livewire.tailwind', ['results_name' => '$volunteers']) !!}--}}
</section>
