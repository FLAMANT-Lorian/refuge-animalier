@props([
    'adoption_requests'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="adoption_request_{!! '1' !!} hover:cursor-pointer" type="checkbox"
               name="adoption_request_{!! '1' !!}"
               id="adoption_request_{!! '1' !!}"
               title="Séléctionner la demande d'adoption">
        <label for="adoption_request_{!! '1' !!}" class="sr-only">Séléctionner la demande d'adoption</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Nom complet&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 hover:cursor-pointer hover:font-bold transition-all ease-in-out duration-200">
                {!! $adoption_requests['name'] !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Adresse e-mail&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $adoption_requests['email'] !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                Animal&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voir la demande d'adoptions de : {!! $adoption_requests['animal'] !!}"
               href="{!! route('admin.animals.show', 1) !!}">
                {!! $adoption_requests['animal'] !!}
            </a>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                Statut&nbsp;:
            </span>
            <div class="flex flex-row justify-start lg:px-4 lg:py-4 font-normal">
                <x-states.adoption-request-state
                    :adoption_request_state="$adoption_requests['status']"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA DEMANDES D'ADOPTION - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="Voir la fiche de : {!! $adoption_requests['name'] !!}"
               href="#">
                Voir la demande
            </a>

            {{-- EDIT --}}
            <x-table.email
                destination="#"/>

        </div>
    </td>
</tr>
