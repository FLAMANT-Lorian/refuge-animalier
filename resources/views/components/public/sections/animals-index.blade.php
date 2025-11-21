<section id="animals" class="px-6 py-[4.5rem] md:px-12 md:py-[6rem] lg:px-[12rem] lg:pb-[11rem]">
    <div class="flex flex-col md:flex-row md:justify-between gap-6">
        <h2 class="text-2xl font-bold">
            Nos animaux
        </h2>

        <x-forms.input-search
            class="mb-8 lg:mb-10"
            name="search-field"
            id="search-field"
            placeholder="Rechercher un animal"
            label="Rechercher un animal"/>
    </div>

    <div
        class="pb-10 animals_container flex flex-col items-center gap-8 min-[700px]:grid min-[700px]:grid-cols-2 min-[1000px]:grid-cols-3 min-[1300px]:grid-cols-4">
        @foreach($animals as $animal)
            <x-public.animals.card :animal="$animal" class="absolute left-4 bottom-4 shadow-(--animal-card-boxshadow)"/>
        @endforeach
    </div>
    {!! $animals->withQueryString()->fragment('animals')->links('vendor.pagination.tailwind', ['results_name' => 'animaux']) !!}
</section>
