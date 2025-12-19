
@props([
    'app_title'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row gap-1 items-center">
                –
                <a wire:navigate
                   class="text-gray-500"
                   title="{!! __('admin/adoption-requests.breadcrumb_title') !!}"
                   href="{!! route('admin.animals.index', config('app.locale')) !!}">
                    {!! __('admin/adoption-requests.title') !!}
                </a>
                →
                <a wire:navigate
                   class="text-gray-500 font-bold hover:underline"
                   title="{!! __('admin/adoption-requests.breadcrumb_create_title') !!}"
                   href="{!! route('admin.adoption-requests.index', config('app.locale')) !!}">
                    {!! $app_title !!}
                </a>
    </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p class="text-gray-500 text-base">{!! __('forms.field_with') !!}<strong
                class="text-red">*</strong>{!! __('forms.are_required') !!}</p>
    </div>
</section>
