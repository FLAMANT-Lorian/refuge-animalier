@props([
    'app_title',
    'animal'
])

<section class="flex flex-col gap-4">
    <span class="flex flex-row gap-1 items-center text-gray-500">
                –
                <a wire:navigate
                   class="text-gray-500"
                   title="{!! __('admin/animals.show_breadcrumb1_title') !!}"
                   href="{!! route('admin.animals.index', ['locale' => config('app.locale')]) !!}">
                    {!! __('admin/animals.show_breadcrumb1_text') !!}
                </a>
                →
                <a wire:navigate
                   class="text-gray-500 font-bold hover:underline"
                   title="{!! __('admin/animals.show_breadcrumb2_title') !!}"
                   href="{!! route('admin.animals.show', ['animal' => $animal->id, 'locale' => config('app.locale')]) !!}">
                    {!! $app_title !!}
                </a>
    </span>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
            <p class="font-base text-gray-500">{!! __('admin/animals.show_sub_title') . $animal->name !!}</p>
        </div>
        <x-buttons.base
            class="self-start md:self-center"
            :destination="route('admin.animals.edit', ['animal' => $animal->id, 'locale' => config('app.locale')])"
            title="{!! __('admin/animals.show_edit_btn_title') . $animal->name !!}">
            {!! __('admin/animals.show_edit_btn_title') . $animal->name !!}
        </x-buttons.base>
    </div>
</section>
