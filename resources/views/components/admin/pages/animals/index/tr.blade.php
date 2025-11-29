@props([
    'animal'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="animal_{!! $animal->id !!} hover:cursor-pointer" type="checkbox" name="animal_{!! $animal->id !!}"
               id="animal_{!! $animal->id !!}"
               title="Séléctionner l'animal">
        <label for="animal_{!! $animal->id !!}" class="sr-only">Séléctionner l'animal</label>
    </td>

    <td class="min-lg:hidden">
        <span class="font-normal sr-only">
            Image de l’animal
        </span>
        <img alt="phot de {!! $animal->name !!}"
            class="w-[5rem] h-[5rem] rounded-2xl" src="{!! asset('assets/img/tmp.png') !!}">
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Nom&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Vers la page de pedro"
               href="{!! route('admin.animals.show', 1) !!}">
                {!! $animal->name !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Race&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $animal->breed !!}
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
                title="Aller vers la page de {!! $animal->name !!}"
                :destination="route('admin.animals.show', 1)"
                class="lg:hidden">
                Voir la fiche de l’animal
            </x-buttons.base>

            {{-- EDIT --}}
            <x-table.edit
                class="max-lg:hidden"
                :destination="route('admin.animals.show', $animal->id)"/>

            {{-- DELETE --}}
            <x-table.delete
                destination="#"/>

        </div>
    </td>

</tr>
