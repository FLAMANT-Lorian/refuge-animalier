@props([
    'note'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="note_{!! '1' !!} hover:cursor-pointer" type="checkbox" name="note_{!! '1' !!}"
               id="note_{!! '1' !!}"
               title="Séléctionner l'animal">
        <label for="note_{!! '1' !!}" class="sr-only">Séléctionner la note</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Nom complet&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voir la note pour {!! $note['name'] !!}"
               href="#">
                {!! $note['name'] !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Adresse e-mail&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $note['email'] !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Date d’envoi&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $note['date'] !!}
            </span>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA NOTE - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="Voir la note pour {!! $note['name'] !!}"
               href="#">
                Voir la note de visite
            </a>

            {{-- EDIT --}}
            <x-table.edit/>

            {{-- DELETE --}}
            <x-table.delete/>

        </div>
    </td>
</tr>
