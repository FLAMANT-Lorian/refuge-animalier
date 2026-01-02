@props([
    'animal'
])

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<article
    class="relative max-md:max-w-100 flex w-full h-full flex-col gap-4 p-6 border border-gray-200 bg-gray-50 rounded-2xl transition-all ease-in-out duration-200 hover:rotate-1 hover:scale-[1.02] hover:border-green-500">
    <a class="absolute z-50 top-0 left-0 bottom-0 right-0"
       title="Vers la page de {!! $animal->name !!}"
       href="{!! route('public.animals.show', ['animal' => $animal->id]) !!}">
        <span class="sr-only">Vers la page de {!! $animal->name !!}
        </span>
    </a>
    <div class="relative">
        @if(empty($animal->pictures))
            <div class="flex justify-center items-center p-4 w-full h-full aspect-square rounded-lg bg-gray-100">
                <p class="font-base font-semibold text-center">{{ __('public/animals.no_images') }}</p>
            </div>
        @else
            <img class="aspect-square rounded-lg w-full h-full"
                 width="500"
                 height="500"
            src="{{ Storage::disk('s3')->url('animals/variant/500x500/' . $animal->pictures[0]) }}"
                 alt="Photo de {{ $animal->name }}">
        @endif
        <x-states.animal-state :animal_state="$animal->state" class="absolute left-4 bottom-4 "/>
    </div>
    <div class="flex items-center justify-between gap-4">
        <h3 class="text-lg font-medium wrap-break-word">{!! $animal->name !!}</h3>
        <span class="">{!! $animal->age . '&nbsp;' . __('public/animals.year') !!}</span>
    </div>
    <div class="flex items-center justify-between gap-4">
        <span class="font-base font-normal py-0.5 px-2 bg-green-200 rounded-2xl">{!! $animal->breed->name !!}</span>
        <span>{!! __('enum.' . $animal->sex) !!}</span>
    </div>
</article>
