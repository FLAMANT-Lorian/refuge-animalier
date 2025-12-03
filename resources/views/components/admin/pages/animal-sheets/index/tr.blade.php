@props([
    'animal_sheet'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="animal_sheet_{!! '1' !!} hover:cursor-pointer" type="checkbox" name="animal_sheet_{!! '1' !!}"
               id="animal_sheet_{!! '1' !!}"
               title="Séléctionner la fiche">
        <label for="animal_sheet_{!! '1' !!}" class="sr-only">Séléctionner la fiche</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Nom de l’animal&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voir la fiche animal de {!! $animal_sheet['name'] !!}"
               href="{!! route('admin.animals.show', 1) !!}">
                {!! $animal_sheet['name'] !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Date&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $animal_sheet['date'] !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Bénévoles&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voir le profil bénévole de {!! $animal_sheet['volunteer'] !!}"
               href="{!! route('admin.volunteers.show', 1) !!}">
                {!! $animal_sheet['volunteer'] !!}
            </a>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                Statut&nbsp;:
            </span>
            <div class="flex flex-row justify-start lg:px-4 lg:py-4 font-normal">
                <x-states.sheet-state
                    :sheet_state="$animal_sheet['status']"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR L'ANIMAL - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="Voir la fiche de : {!! $animal_sheet['name'] !!}"
               href="{!! route('admin.animals.show', 1) !!}">
                Voir la fiche de l’animal
            </a>

            {{-- EDIT --}}
            <x-table.edit
                class="max-lg:hidden"
                :destination="route('admin.animals.show', 1)"/>

        </div>
    </td>
</tr>
