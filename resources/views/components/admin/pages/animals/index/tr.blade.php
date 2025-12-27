@props([
    'animal'
])

@php
    use App\Models\Animal;
    use App\Models\AnimalSheet;
@endphp

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="animal_{!! $animal->id !!} hover:cursor-pointer" type="checkbox" name="animal_{!! $animal->id !!}"
               id="animal_{!! $animal->id !!}"
               title="{!! __('admin/animals.one_selector') !!}">
        <label for="animal_{!! $animal->id !!}" class="sr-only">{!! __('admin/animals.one_selector') !!}</label>
    </td>

    <td class="min-lg:hidden">
        <span class="font-normal sr-only">
            {!! __('admin/animals.animals_img') !!}
        </span>
        <img alt="photo de {!! $animal->name !!}"
             class="w-[5rem] h-[5rem] rounded-2xl" src="{!! asset('assets/img/tmp.png') !!}">
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animals.show_name') !!}&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Vers la page de pedro"
               href="{!! route('admin.animals.show', ['animal' => $animal->id, 'locale' => config('app.locale')]) !!}">
                {!! $animal->name !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animals.show_breed') !!}&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $animal->breed->name !!}
            </span>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:flex-1 lg:text-left">
        <div class="lg:flex lg:justify-items-start lg:px-4">
            <x-states.animal-state
                :animal_state="$animal->state"/>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA FICHE DE L’ANIMAL - MOBILE --}}
            <x-buttons.base
                :title="__('admin/animals.view_animal_details_title') . $animal->name"
                :destination="route('admin.animals.show', ['animal' => $animal->id, 'locale' => config('app.locale')])"
                class="lg:hidden">
                {!! __('admin/animals.view_animal_details') !!}
            </x-buttons.base>

            @can('update', Animal::class)

                {{-- EDIT --}}
                <x-table.edit
                    class="max-lg:hidden"
                    :title="__('admin/animals.modification_link_title')"
                    :destination="route('admin.animals.edit', ['animal' => $animal->id, 'locale' => config('app.locale')])"/>

            @endcan

            @can('create', AnimalSheet::class)

                <button type="button" wire:click="openModal('ask-for-update',{{ $animal->id }})">
                    <svg
                        {!! $attributes->merge(['class' => 'rounded-0 hover:bg-green-100 border border-transparent hover:border-green-300 hover:rounded-lg transition-all ease-in-out duration-200']) !!}
                        width="36"
                        height="36"
                        viewBox="0 0 36 36"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M15.5572 27.5574H10.7572C9.43168 27.5574 8.35717 26.4828 8.35718 25.1574L8.35727 10.7574C8.35728 9.43193 9.43179 8.35742 10.7573 8.35742H21.5575C22.883 8.35742 23.9575 9.43194 23.9575 10.7574V15.5574M12.5576 13.1574H19.7576M12.5576 16.7574H19.7576M12.5576 20.3574H16.1576M19.1574 24.2484L24.2485 19.1573L27.6427 22.5514L22.5515 27.6426H19.1574V24.2484Z"
                            stroke="#292A2B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>

            @endcannot

            @can('delete', Animal::class)

                {{-- DELETE --}}
                <x-table.delete
                    wire:click="openModal('delete-animal' , {!! $animal->id !!})"
                />

            @endcan

        </div>
    </td>

</tr>
