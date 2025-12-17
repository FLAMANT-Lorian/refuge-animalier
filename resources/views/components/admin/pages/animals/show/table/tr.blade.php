@props([
    'note',
    'animal'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="note_{!! $note->id !!} hover:cursor-pointer" type="checkbox" name="note_{!! $note->id !!}"
               id="note_{!! $note->id !!}"
               title="{!! __('admin/animals.select_one_note') !!}">
        <label for="note_{!! $note->id !!}" class="sr-only">{!! __('admin/animals.select_one_note') !!}</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th1') !!}
            </span>
            <button type="button"
                    wire:click="openModal('edit-note', {!! $animal !!})"
                    class="hover:font-bold hover:cursor-pointer text-left lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200">
                {!! $note->full_name !!}
            </button>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th2') !!}
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $note->email !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th3') !!}
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! strtolower($note->visit_date->translatedFormat('d F Y')) !!}
            </span>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA NOTE - MOBILE --}}
            <button type="button"
                    wire:click="openModal('edit-note', {!! $animal !!})"
                    class="cursor-pointer lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all">
                {!! __('admin/animals.view_visit_note') !!}
            </button>

            {{-- EDIT --}}
            <x-table.edit-modal
                wire:click="openModal('edit-note', {!! $animal !!})"/>

            {{-- DELETE --}}
            <x-table.delete
                wire:click="openModal('delete-note', {!! $animal !!})"/>

        </div>
    </td>
</tr>
