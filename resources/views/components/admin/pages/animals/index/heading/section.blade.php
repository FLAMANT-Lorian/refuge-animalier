@props([
    'app_title'
])

<section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

    {{-- FIL D'ARIANE --}}
    <a wire:navigate
       title="{!! __('admin/animals.breadcrumb_title') !!}"
       href="{!! route('admin.animals.index', config('app.locale')) !!}"
       class="self-start font-bold text-gray-500">
        – {!! $app_title !!}
    </a>

    <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
        <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
            <h2 class="text-2xl font-bold">{!! __('admin/animals.title') !!}</h2>
            <p class="text-base text-gray-500">{!! __('admin/animals.sub_title1') . '26' . __('admin/animals.sub_title2') !!}</p>
        </div>

        <x-admin.pages.animals.index.heading.actions/>
    </div>

</section>
