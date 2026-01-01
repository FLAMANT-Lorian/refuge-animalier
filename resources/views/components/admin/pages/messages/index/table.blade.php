@props([
    'messages'
])

<section {{ $attributes->merge(['class' => 'flex flex-col gap-6']) }}>
    <h2 class="sr-only">Index des messages</h2>
    @if($messages->isNotEmpty())
        <table class="lg:overflow-hidden lg:border-separate lg:rounded-2xl lg:border lg:border-green-300 lg:border-spacing-0">

            {{-- THEAD --}}
            <x-admin.pages.messages.index.thead/>

            {{-- TBODY --}}
            <x-admin.pages.messages.index.tbody :messages="$messages"/>
        </table>
    @else
        <x-admin.partials.no-result/>
    @endif

    {{--  PAGINATION --}}
    {{ $messages->links('vendor.livewire.tailwind', ['results_name' => __('admin/messages.paginator')]) }}
</section>
