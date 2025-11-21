<x-public.app title="{!! $animal->name !!} · Les pattes heureuses">
    <main id="content" class="animal_detail">

        <x-public.sections.animal-detail :animal="$animal"/>

    </main>
</x-public.app>
