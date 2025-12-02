@props([
    'messages'
])

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <table class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

        {{-- THEAD --}}
        <x-admin.pages.messages.index.thead/>

        {{-- TBODY --}}
        <x-admin.pages.messages.index.tbody :messages="$messages"/>
    </table>

    {{--  PAGINATION --}}
    {{--{!! $animals->links('vendor.livewire.tailwind', ['results_name' => '$messages']) !!}--}}
</section>
