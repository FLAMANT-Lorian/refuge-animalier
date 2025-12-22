@props([
    'adoption_request'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-12">
        <input class="adoption_request_{!! $adoption_request->id !!} hover:cursor-pointer" type="checkbox"
               name="adoption_request_{!! $adoption_request->id !!}"
               id="adoption_request_{!! $adoption_request->id !!}"
               title="{!! __('admin/adoption-requests.one_selector') !!}">
        <label for="adoption_request_{!! $adoption_request->id !!}"
               class="sr-only">{!! __('admin/adoption-requests.one_selector') !!}</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/adoption-requests.full_name') !!}&nbsp;:
            </span>
            <a href="{{ route('admin.adoption-requests.edit', ['locale' => app()->getLocale(), 'adoption_request' => $adoption_request]) }}"
               title=""
               class="text-left lg:px-4 lg:py-4 hover:cursor-pointer hover:font-bold transition-all ease-in-out duration-200">
                {!! $adoption_request->full_name !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/adoption-requests.email') !!}&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $adoption_request->email !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/adoption-requests.animal') !!}&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voir la demande d'adoptions de : {!! $adoption_request->animal->name !!}"
               href="{!! route('admin.animals.show', ['animal' => $adoption_request->animal->id, 'locale' => config('app.locale')]) !!}">
                {!! $adoption_request->animal->name !!}
            </a>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-40">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                {!! __('admin/adoption-requests.status') !!}&nbsp;:
            </span>
            <div class="flex flex-row justify-start font-normal">
                <x-states.adoption-request-state
                    :adoption_request_state="$adoption_request->status"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-37.5">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA DEMANDES D'ADOPTION - MOBILE --}}
            <button type="button"
                    wire:click="openModal('adoption-request')"
                    class="cursor-pointer lg:hidden font-medium px-4 py-2.5 bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all">
                {!! __('admin/adoption-requests.view_adoption_request') !!}
            </button>

            {{-- DELETE --}}
            <x-table.delete
                wire:click="openModal('delete-adoption-request')"/>

        </div>
    </td>
</tr>
