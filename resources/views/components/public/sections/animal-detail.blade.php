@php
    use App\Enums\AnimalStatus;
@endphp

@props([
    'animal'
])

<section class="relative py-[4.5rem] md:py-[6rem] lg:py-[11rem] px-6 md:px-12 lg:px-[12rem] flex flex-col gap-[4.5rem] min-[1000px]:grid min-[1000px]:gap-6 min-[1000px]:items-start min-[1000px]:grid-cols-[repeat(13,minmax(0,1fr))]">
    <h2 class="sr-only">Fiche de {!! $animal->name !!}</h2>
    <article class="flex flex-col gap-8 min-[1000px]:col-start-8 min-[1000px]:col-end-14 min-[1000px]:row-start-1">

        {{-- HERO --}}
        <x-public.animals.show-hero :animal="$animal"/>

        {{-- INFORMATIONS --}}
        <x-public.animals.show-informations :animal="$animal"/>

        {{-- FORMULAIRE --}}
        @if($animal->state !== AnimalStatus::ProcessOfAdoption->value)
            <x-public.animals.show-form/>
        @endif
    </article>

    {{-- GALERIE --}}
    <x-public.animals.show-galerie :animal="$animal" class="min-[1000px]:sticky min-[1000px]:top-12 min-[1000px]:col-start-1 min-[1000px]:col-end-7 min-[1000px]:row-start-1"/>
</section>
