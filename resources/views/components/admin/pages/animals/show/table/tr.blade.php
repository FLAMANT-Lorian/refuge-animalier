@props([
    'note',
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th1') !!}
            </span>
            <button type="button"
                    wire:click="openModal('edit-note', {{ $note->id }})"
                    class="hover:cursor-pointer text-left lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200">
                {!! $note->full_name !!}
            </button>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th2') !!}
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! $note->email !!}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="lg:hidden font-bold">
                {!! __('admin/animals.visit_notes_th3') !!}
            </span>
            <span class="lg:px-4 lg:py-4 font-normal">
                {!! strtolower($note->visit_date->translatedFormat('d F Y')) !!}
            </span>
        </div>
    </td>

    <td class="font-medium lg:w-37.5">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA NOTE - MOBILE --}}
            <button type="button"
                    wire:click="openModal('edit-note', {!! $note->id !!})"
                    class="cursor-pointer lg:hidden font-medium px-4 py-2.5 bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all">
                {!! __('admin/animals.view_visit_note') !!}
            </button>

            {{-- EDIT --}}
            <x-table.edit-modal
                wire:click="openModal('edit-note', {!! $note->id !!})"/>

            {{-- DELETE --}}
            <x-table.delete
                wire:click="openModal('delete-note', {!! $note->id !!})"/>

        </div>
    </td>
</tr>
