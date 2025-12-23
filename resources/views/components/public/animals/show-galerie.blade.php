@props([
    'animal'
])

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<aside {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <h3 class="text-2xl font-bold">Galerie</h3>
    <ul class="grid grid-cols-2 gap-6 min-[600px]:grid-cols-4 min-[1000px]:grid-cols-3">
        @foreach($animal->pictures as $picture)
            <img class="w-full h-full {{ $loop->first ?
 'col-start-1 col-end-3 min-[600px]:col-end-4 min-[600px]:row-start-1 min-[600px]:row-end-4 min-[1000px]:max-h-[22.5rem] aspect-square min-[1000px]:aspect-auto rounded-2xl overflow-hidden' :
 'aspect-square rounded-2xl overflow-hidden'}}"
                 src="{{ Storage::disk('public')->url($picture) }}" alt="Photo de {{ $animal->name }}">
        @endforeach
    </ul>
</aside>
