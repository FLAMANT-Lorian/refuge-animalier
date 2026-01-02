<section id="animals" class="px-6 py-[4.5rem] md:px-12 md:py-[6rem] lg:px-[12rem] lg:pb-[11rem]">
    <div class="flex flex-col md:flex-row md:justify-between gap-6 pb-6">
        <h2 class="text-2xl font-bold">
            {{ __('public/animals.index_animals_title') }}
        </h2>

        <form class="flex flex-row items-start gap-4" method="get" action="{{ route('public.animals.index') }}">
            <x-forms.fields.input-search
                class="lg:mb-10"
                name="search"
                id="search"
                placeholder="{!! __('public/animals.index_animals_search_placeholder') !!}"
                label="{!! __('public/animals.index_animals_search_label') !!}"/>

            <x-forms.buttons.outlined-button-submit
                label="Rechercher"/>
        </form>
    </div>

    @if($animals->isNotEmpty())
        <div
            class="pb-10 animals_container flex flex-col items-center gap-8 min-[700px]:grid min-[700px]:grid-cols-2 min-[1000px]:grid-cols-3 min-[1300px]:grid-cols-4">
            @foreach($animals as $animal)
                <x-public.animals.card :animal="$animal" class="shadow-(--animal-card-boxshadow)"/>
            @endforeach
        </div>
    @else
        <x-public.partials.no-available-animals/>
    @endif
    {!! $animals->withQueryString()->fragment('animals')->links('vendor.pagination.tailwind', ['results_name' => 'animaux']) !!}
</section>
