@props([
    'animal'
])

<section class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">Nom</dt>
        <dd class="text-lg font-bold">{!! $animal->name !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">Age</dt>
        <dd class="text-lg font-bold">{!! $animal->age !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">Race</dt>
        <dd class="text-lg font-bold">{!! $animal->breed !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">Pelage</dt>
        <dd class="text-lg font-bold">{!! $animal->color !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">Sexe</dt>
        <dd class="text-base overflow-y-auto">{!! $animal->sex !!}</dd>
    </div>

    <div class="min-h-[12.5rem] md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">Vaccins</dt>
        @if(!empty($animal->vaccines))
            <dd class="text-base">{!! $animal->vaccines !!}</dd>
        @else
            <dd class="text-base italic">Non renseignés</dd>
        @endif
    </div>

    <div class="md:col-start-2 md:col-end-3 row-start-3 row-end-5 min-h-[12.5rem] md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">Caractère</dt>
        <dd class="text-base overflow-y-auto">{!! $animal->description !!}</dd>
    </div>

    <div class="md:col-start-1 md:col-end-3 lg:col-start-3 lg:col-end-5 lg:row-start-1 lg:row-end-5 flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <span class="font-base font-bold">Photos</span>

        {!! responsiveImage(
                img_name: $animal->img_path,
                img_alt: 'Image de' . $animal->name,
                picture_class: 'rounded-lg overflow-hidden',
                img_class: '') !!}
    </div>

</section>
