@props([
    'animals'
])

<section class="flex flex-col gap:6">
    <table class="w-full overflow-hidden border-separate rounded-2xl border border-green-300 border-spacing-0">

        {{-- THEAD --}}
        <x-admin.pages.animals.index.thead/>

        {{-- TBODY --}}
        <x-admin.pages.animals.index.tbody :animals="$animals"/>
    </table>

    {{--  PAGINATION --}}
    {!! $animals->links('vendor.livewire.tailwind', ['results_name' => 'animaux']) !!}
</section>
