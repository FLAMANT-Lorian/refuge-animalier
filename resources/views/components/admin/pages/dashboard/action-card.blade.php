@props([
    'title',
    'subtitle',
    'img_path',
    'img_alt',
    'destination',
    'destination_title'
])

<div class="relative hover:bg-green-100 bg-gray-50 transition-all ease-in-out duration-200 flex items-center justify-between gap-6 p-4 border border-green-300 rounded-2xl">
    <div>
        <h4 class="text-lg font-semibold">{!! $title !!}</h4>
        <p class="text-base font-normal">{!! $subtitle !!}</p>
    </div>
    <img class="w-[3.125rem]" src="{!! $img_path !!}"
         alt="{!! $img_alt !!}">
    <a wire:navigate class="absolute top-0 right-0 bottom-0 left-0 rounded-2xl"
       title="{!! $destination_title !!}"
       href="{!! $destination !!}"><span class="sr-only">{!! $destination_title !!}</span></a>
</div>
