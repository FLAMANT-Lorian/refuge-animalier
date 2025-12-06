@props([
    'volunteers'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="volunteer_{!! '1' !!} hover:cursor-pointer" type="checkbox" name="volunteer_{!! '1' !!}"
               id="volunteer_{!! '1' !!}"
               title="Séléctionner le bénévole">
        <label for="volunteer_{!! '1' !!}" class="sr-only">Séléctionner le bénévole</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Nom complet&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voie le bénévole : {!! $volunteers['name'] !!}"
               href="{!! route('admin.volunteers.show', 1) !!}">
                {!! $volunteers['name'] !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Adresse e-mail&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $volunteers['email'] !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Date d’envoi&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $volunteers['date'] !!}
            </span>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                Statut&nbsp;:
            </span>
            <div class="flex flex-row justify-start font-normal">
                <x-states.volunteer-state
                    :volunteer_state="$volunteers['status']"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LE BÉNÉVOLES - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="Voir la fiche de : {!! $volunteers['name'] !!}"
               href="{!! route('admin.volunteers.show', 1) !!}">
                Voir la fiche du bénévole
            </a>

            {{-- EDIT --}}
            <x-table.edit
                title="Vers la fiche du bénévole"
                class="max-lg:hidden"
                :destination="route('admin.volunteers.show', 1)"/>

            {{-- DELETE --}}
            <x-table.delete
                wire:click="openModal('delete-volunteer')"/>

        </div>
    </td>
</tr>
