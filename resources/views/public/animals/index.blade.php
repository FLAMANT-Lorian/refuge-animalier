<x-public.app title="{!! __('public/animals.index_page_title') !!}">

    <main class="animals_index" id="content">

        {{-- HERO SECTION --}}
        <x-public.sections.hero/>

        {{-- ANIMALS SECTION--}}
        <x-public.sections.animals-index :animals="$animals" :search="$search"/>

    </main>

</x-public.app>
