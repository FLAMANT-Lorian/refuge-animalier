@props([
    'animal'
])

<section class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-4 gap-6">
    <h2 class="sr-only">Informations sur {{ $animal->name }}</h2>
    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">{!! __('admin/animals.show_name') !!}</dt>
        <dd class="text-lg font-bold">{!! $animal->name !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">{!! __('admin/animals.show_birth_date') . ' (' . $animal->age . ' ans)' !!}</dt>
        <dd class="text-lg font-bold">{!! $animal->translatedFormatDate !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">{!! __('admin/animals.show_breed') !!}</dt>
        <dd class="text-lg font-bold">{!! $animal->breed->name !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">{!! __('admin/animals.show_color') !!}</dt>
        <dd class="text-lg font-bold">{!! $animal->coat !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_sex') !!}</dt>
        <dd class="text-base overflow-y-auto">{!! __('enum.' . $animal->sex) !!}</dd>
    </div>

    <div
        class="max-h-[9rem] min-h-50 md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_vaccines') !!}</dt>
        @if(!empty($animal->vaccines))
            <dd class="text-base">{!! $animal->vaccines !!}</dd>
        @else
            <dd class="text-base italic">{!! __('admin/animals.no_vaccines') !!}</dd>
        @endif
    </div>

    <div
        class="max-h-[18rem] overflow-auto md:col-start-2 md:col-end-3 row-start-3 row-end-5 min-h-[12.5rem] md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_description') !!}</dt>
        <dd class="text-base overflow-y-auto">{!! $animal->character !!}</dd>
    </div>

    <div
        class="md:col-start-1 md:col-end-3 lg:col-start-3 lg:col-end-5 lg:row-start-1 lg:row-end-5 flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <span class="font-base font-bold">{!! __('admin/animals.show_pictures') !!}</span>

        @if($animal->pictures)

            <div class="grid grid-cols-2 gap-6 min-[600px]:grid-cols-4">
                @foreach($animal->pictures as $picture)
                    @if(Storage::disk('public')->exists('animals/variant/500x500/' . $picture))
                        <img class="{{ $loop->first ?
             'col-start-1 col-end-3 min-[600px]:col-end-4 min-[600px]:row-start-1 min-[600px]:row-end-4 aspect-square rounded-2xl overflow-hidden' :
             'aspect-square rounded-2xl overflow-hidden' }} object-fill w-full h-full rounded-2xl"
                             width="500"
                             height="500"
                             src="{{ asset('storage/animals/variant/500x500/' . $picture) }}"
                             alt="{{ __('admin/animals.picture_of') . $animal->name }}">
                    @else
                        <div class="aspect-square rounded-2xl bg-white border border-gray-200 flex items-center justify-center">
                            <span class="text-black text-center ">{{ __('admin/animals.image_process') }}</span>
                        </div>
                    @endif
                @endforeach
            </div>

        @else
            <p class="italic">{{ __('public/animals.no_images') }}</p>
        @endif
    </div>

</section>
