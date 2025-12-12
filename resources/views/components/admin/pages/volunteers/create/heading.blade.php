@props([
    'app_title'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row gap-1 items-center text-gray-500">
                –
                <a class="text-gray-500"
                   title="{!! __('admin/animals.create_breadcrumb1_title') !!}"
                   href="{!! route('admin.volunteers.index', config('app.locale')) !!}">
                    {!! __('admin/animals.create_breadcrumb1_text') !!}
                </a>
                →
                <a class="text-gray-500 font-bold hover:underline"
                   title="Vers la page de création d’un bénévole"
                   href="{!! route('admin.volunteers.create', config('app.locale')) !!}">
                    {!! $app_title !!}
                </a>
            </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p class="text-gray-500 text-base">{!! __('forms.field_with') !!}<strong
                class="text-red">*</strong> {!! __('forms.are_required') !!}</p>
    </div>
</section>
