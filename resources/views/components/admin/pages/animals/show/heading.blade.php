@props([
    'app_title',
    'animal'
])

@php
    use App\Models\Animal;
    use App\Models\AnimalSheet;
@endphp

<section class="flex flex-col gap-4">
    <span class="flex flex-row flex-wrap gap-1 items-center text-gray-500">
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
        <div class="flex flex-col">
            <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
            <p class="font-base pb-2 text-gray-500">{!! __('admin/animals.show_sub_title') . $animal->name !!}</p>
            <x-states.animal-state
                class="self-start"
                :animal_state="$animal->state"/>
        </div>

        @can('create', Animal::class)

            <x-buttons.base
                class="self-start md:self-center"
                :destination="route('admin.animals.edit', ['animal' => $animal->id, 'locale' => config('app.locale')])"
                title="{!! __('admin/animals.show_edit_btn_title') . $animal->name !!}">
                {!! __('admin/animals.show_edit_btn_title') . $animal->name !!}
            </x-buttons.base>

        @endcan

        @can('create', AnimalSheet::class)

            <button type="button"
                    wire:click="openModal('ask-for-update')"
                    class="text-center font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all">
                Demander une modification
            </button>

        @endcan
    </div>
</section>
