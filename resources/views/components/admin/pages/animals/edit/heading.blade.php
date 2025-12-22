@props([
    'app_title',
    'animal'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row flex-wrap gap-1 items-center">
                –
                <a wire:navigate
                   class="text-gray-500"
                   title="{!! __('admin/animals.edit_breadcrumb1_title') !!}"
                   href="{!! route('admin.animals.index', config('app.locale')) !!}">
                    {!! __('admin/animals.edit_breadcrumb1_text') !!}
                </a>
                →
                <a wire:navigate
                   class="text-gray-500"
                   title="{!! __('admin/animals.edit_breadcrumb2_title') !!}"
                   href="{!! route('admin.animals.show', ['animal' => $animal->id, 'locale' => config('app.locale')]) !!}">
                    {!! __('admin/animals.edit_breadcrumb2_text') . $animal->name !!}
                </a>
                →
                <a wire:navigate
                   class="text-gray-500 font-bold hover:underline"
                   title="{!! __('admin/animals.edit_breadcrumb3_title') !!}"
                   href="{!! route('admin.animals.edit', ['animal' => $animal->id, 'locale' => config('app.locale')]) !!}">
                    {!! $app_title !!}
                </a>
    </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p class="text-gray-500 text-base">
            {!! __('forms.field_with') !!}
            <strong class="text-red">*</strong>
            {!! __('forms.are_required') !!}
        </p>
    </div>
</section>
