@props([
    'animal_sheet'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="animal_sheet_{!! $animal_sheet->id !!} hover:cursor-pointer" type="checkbox"
               name="animal_sheet_{!! $animal_sheet->id !!}"
               id="animal_sheet_{!! $animal_sheet->id !!}"
               title="{!! __('admin/animal-sheets.one_selector') !!}">
        <label for="animal_sheet_{!! $animal_sheet->id !!}"
               class="sr-only">{!! __('admin/animal-sheets.one_selector') !!}</label>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animal-sheets.volunteer') !!}&nbsp;:
            </span>
            <a wire:navigate
               class="hover:font-bold trans-all text-left cursor-pointer lg:px-4 lg:py-4 font-normal"
               href="
               {!! $animal_sheet->user->is(auth()->user()) ?
                    route('admin.settings', app()->getLocale()) :
                    route('admin.volunteers.show', ['volunteer' => $animal_sheet->user, 'locale' => app()->getLocale()])
               !!}"
               title="{!! __('admin/volunteers.view_volunteer_sheet') !!}">
                {!! $animal_sheet->user->fullName !!}
            </a>
        </div>
    </td>
    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animal-sheets.animal') !!}&nbsp;:
            </span>
            <a href="{!! route('admin.animals.show', ['animal' => $animal_sheet->animal, 'locale' => app()->getLocale()]) !!}"
               title="{!! __('admin/animals.show_breadcrumb2_title') !!}"
               class="hover:font-bold trans-all lg:px-4 lg:py-4 font-normal">
                {!! $animal_sheet->animal->name !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animal-sheets.date') !!}&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $animal_sheet->date->translatedFormat('d F Y') !!}
            </span>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                {!! __('admin/animal-sheets.status') !!}&nbsp;:
            </span>
            <div class="flex flex-row justify-start font-normal">
                <x-states.sheet-state
                    :sheet_state="$animal_sheet->status"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR L'ANIMAL - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="{!! __('admin/animal-sheets.view_animal_sheet_of') . $animal_sheet['name'] !!}"
               href="{!! route('admin.animals.show', ['animal' => 1, 'locale' => config('app.locale')]) !!}">
                {!! __('admin/animal-sheets.view_animal_sheet') !!}
            </a>

            {{-- EDIT --}}
            <button wire:click="openModal('sheet-message')"
                    class="hover:cursor-pointer">
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
        </div>
    </td>
</tr>
