@props([
    'volunteer'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="volunteer_{!! $volunteer->id !!} hover:cursor-pointer" type="checkbox" name="volunteer_{!! $volunteer->id !!}"
               id="volunteer_{!! $volunteer->id !!}"
               title="{!! __('admin/volunteers.one_selector') !!}">
        <label for="volunteer_{!! $volunteer->id !!}" class="sr-only">{!! __('admin/volunteers.one_selector') !!}</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/volunteers.name') !!}&nbsp;:
            </span>
            <a wire:navigate
               class="lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200"
               title="Voie le bénévole : {!! $volunteer->full_name !!}"
               href="{!! route('admin.volunteers.show', ['volunteer' => $volunteer->id, 'locale' => config('app.locale')]) !!}">
                {!! $volunteer->full_name !!}
            </a>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/volunteers.email') !!}&nbsp;:
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $volunteer->email !!}
            </span>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                {!! __('admin/volunteers.status') !!}&nbsp;:
            </span>
            <div class="flex flex-row justify-start font-normal">
                <x-states.volunteer-state
                    :volunteer_state="$volunteer->status"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LE BÉNÉVOLES - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="{!! __('admin/volunteers.view_volunteer_sheet_title') . $volunteer->full_name !!}"
               href="{!! route('admin.volunteers.show', ['volunteer' => 1, 'locale' => config('app.locale')]) !!}">
                {!! __('admin/volunteers.view_volunteer_sheet') !!}
            </a>

            {{-- EDIT --}}
            <x-table.edit
                :title="__('admin/volunteers.view_volunteer_sheet')"
                class="max-lg:hidden"
                :destination="route('admin.volunteers.show', ['volunteer' => 1, 'locale' => config('app.locale')])"/>

            {{-- DELETE --}}
            <x-table.delete
                wire:click="openModal('delete-volunteer')"/>

        </div>
    </td>
</tr>
