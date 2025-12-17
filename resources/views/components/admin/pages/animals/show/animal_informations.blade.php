@props([
    'animal'
])

<section class="flex flex-col md:grid md:grid-cols-2 lg:grid-cols-4 gap-6">

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
        <dd class="text-lg font-bold">{!! $animal->breed !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base">{!! __('admin/animals.show_color') !!}</dt>
        <dd class="text-lg font-bold">{!! $animal->coat !!}</dd>
    </div>

    <div class="flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_sex') !!}</dt>
        <dd class="text-base overflow-y-auto">{!! $animal->sex !!}</dd>
    </div>

    <div
        class="min-h-[12.5rem] md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_vaccines') !!}</dt>
        @if(!empty($animal->vaccines))
            <dd class="text-base">{!! $animal->vaccines !!}</dd>
        @else
            <dd class="text-base italic">{!! __('admin/animals.no_vaccines') !!}</dd>
        @endif
    </div>

    <div
        class="md:col-start-2 md:col-end-3 row-start-3 row-end-5 min-h-[12.5rem] md:min-h-full flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <dt class="text-base font-bold">{!! __('admin/animals.show_description') !!}</dt>
        <dd class="text-base overflow-y-auto">{!! $animal->description !!}</dd>
    </div>

    <div
        class="md:col-start-1 md:col-end-3 lg:col-start-3 lg:col-end-5 lg:row-start-1 lg:row-end-5 flex flex-col gap-2 p-4 border bg-white lg:bg-gray-50 border-green-300 rounded-lg">
        <span class="font-base font-bold">{!! __('admin/animals.show_pictures') !!}</span>

        {!! responsiveImage(
                img_name: $animal->img_path,
                img_alt: __('admin/animals.picture_of') . $animal->name,
                picture_class: 'rounded-lg overflow-hidden',
                img_class: '') !!}
    </div>

</section>
