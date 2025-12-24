@props([
    'animal'
])

@php
    use Illuminate\Support\Facades\Storage;
@endphp

<aside {!! $attributes->merge(['class' => 'flex flex-col gap-6']) !!}>
    <h3 class="text-2xl font-bold">Galerie</h3>
    <ul class="grid grid-cols-2 gap-6 min-[600px]:grid-cols-4 min-[1000px]:grid-cols-3">
        @if(!empty($animal->pictures))
            @foreach($animal->pictures as $picture)
                <img
                    width="500"
                    height="500"
                    class="w-full h-full {{ $loop->first ?
 'col-start-1 col-end-3 min-[600px]:col-end-4 min-[600px]:row-start-1 min-[600px]:row-end-4 min-[1000px]:max-h-[22.5rem] aspect-square min-[1000px]:aspect-auto rounded-2xl overflow-hidden' :
 'aspect-square rounded-2xl overflow-hidden'}}"
                     src="{{ asset('storage/animals/variant/500x500/' . $picture) }}" alt="Photo de {{ $animal->name }}">
            @endforeach
        @else
            <div class="col-start-1 col-end-4 min-[600px]:col-end-5 row-start-1 row-end-10 w-full h-full rounded-lg p-4 flex justify-center items-center bg-gray-100">
                <p class="font-base font-semibold text-center">{{ __('public/animals.no_images') }}</p>
            </div>
        @endif
    </ul>
</aside>
