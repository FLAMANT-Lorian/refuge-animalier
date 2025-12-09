@props([
    'animal'
])

<article
    class="relative max-md:max-w-[25rem] flex h-full flex-col gap-4 p-6 border border-gray-200 bg-gray-50 rounded-2xl transition-all ease-in-out duration-200 hover:rotate-1 hover:scale-[1.02] hover:border-green-500">
    <a class="absolute z-50 top-0 left-0 bottom-0 right-0"
       title="Vers la page de {!! $animal->name !!}"
       href="{!! route('public.animals.show', ['animal' => $animal->id]) !!}">
        <span class="sr-only">Vers la page de {!! $animal->name !!}
        </span>
    </a>
    <div class="relative">
        {!!  responsiveImage(
        $animal->img_path,
        "Photo de $animal->name",
        "",
        'aspect-square rounded-lg w-full h-full')
!!}
        <x-states.animal-state :animal_state="$animal->state" class="absolute left-4 bottom-4 "/>
    </div>
    <div class="flex items-center justify-between gap-4">
        <h3 class="text-lg font-medium">{!! $animal->name !!}</h3>
        <span>{!! $animal->age !!} ans</span>
    </div>
    <div class="flex items-center justify-between gap-4">
        <span class="font-base font-normal py-0.5 px-2 bg-green-200 rounded-2xl">{!! $animal->breed !!}</span>
        <span>{!! $animal->sex !!}</span>
    </div>
</article>
