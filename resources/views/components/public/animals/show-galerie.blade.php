@props([
    'animal'
])

<aside {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <h3 class="text-2xl font-bold">Galerie</h3>
    <ul class="grid grid-cols-2 gap-6 min-[600px]:grid-cols-4 min-[1000px]:grid-cols-3">
        {!!  responsiveImage(
        $animal->img_path,
        "Photo de $animal->name",
        "col-start-1 col-end-3 min-[600px]:col-end-4 min-[600px]:row-start-1 min-[600px]:row-end-4 min-[1000px]:max-h-[22.5rem] aspect-square min-[1000px]:aspect-auto rounded-2xl overflow-hidden",
        'w-full h-full')
        !!}

        {!!  responsiveImage(
        $animal->img_path,
        "Photo de $animal->name",
        "aspect-square rounded-2xl overflow-hidden",
        'w-full h-full')
        !!}

        {!!  responsiveImage(
        $animal->img_path,
        "Photo de $animal->name",
        "aspect-square rounded-2xl overflow-hidden",
        'w-full h-full')
        !!}

        {!!  responsiveImage(
        $animal->img_path,
        "Photo de $animal->name",
        "aspect-square rounded-2xl overflow-hidden",
        'w-full h-full')
        !!}

    </ul>
</aside>
