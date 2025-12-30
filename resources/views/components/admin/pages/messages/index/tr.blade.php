@props([
    'message'
])

<tr scope="row"
    class="relative flex flex-col gap-4 lg:gap-0 p-4 lg:p-0 border border-gray-200 lg:border-none rounded-2xl lg:rounded-none lg:flex-row lg:w-full lg:bg-white lg:items-center lg:nth-of-type-[odd]:bg-gray-50 lg:nth-of-type-[even]:bg-white">

    <td class="max-lg:hidden flex justify-center px-2 w-[3rem]">
        <input class="message_{{ $message->id }} hover:cursor-pointer" type="checkbox" name="message_{{ $message->id }}"
               id="message_{{ $message->id }}" title="{!! __('admin/messages.one_selector') !!}"> <label
            for="message_{{ $message->id }}" class="sr-only">{!! __('admin/messages.one_selector') !!}</label>
    </td>

    <td class="lg:flex-1 h-full lg:text-left font-normal">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {{ __('admin/messages.name') }}&nbsp;:
            </span>
            @if($message->full_name)
                <button type="button" wire:click="openModal('message', {{ $message->id }})"
                        class="text-left cursor-pointer lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200">
                    {{ $message->full_name }}
                </button>
            @else
                <button type="button" wire:click="openModal('message', {{ $message->id }})"
                        class="text-left cursor-pointer lg:px-4 lg:py-4 hover:font-bold transition-all ease-in-out duration-200">
                    –
                </button>
            @endif
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {{ __('admin/messages.email') }}&nbsp;:
            </span> <span class="lg:px-4 lg:py-4 font-normal">
                {{ $message->email }}
            </span>
        </div>
    </td>

    <td class="lg:flex-1 lg:text-left">
        <div class="flex flex-col gap-1">
            <span class="min-lg:hidden font-bold">
                {{ __('admin/messages.date') }}&nbsp;:
            </span> <span class="lg:px-4 lg:py-4 font-normal">
                {{ $message->translatedFormatDate }}
            </span>
        </div>
    </td>

    <td class="absolute top-4 right-4 lg:static lg:text-left lg:w-[10rem]">
        <div class="flex flex-col gap-1">
            <span class="hidden font-bold">
                {{ __('admin/messages.status') }}&nbsp;:
            </span>
            <div class="flex flex-row justify-start font-normal">
                <x-states.message-state :message_state="$message->status"/>
            </div>
        </div>
    </td>

    <td class="font-medium lg:w-[9.375rem]">
        <div class="flex justify-between items-center lg:justify-end flex-row gap-4 lg:px-4">

            {{-- VOIR LA MESSAGE - MOBILE --}}
            <a class="lg:hidden font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
               title="{{ __('admin/messages.view_message_of') . $message->full_name }}" href="#">
                {{ __('admin/messages.view_message') }}
            </a>

            {{-- DELETE --}}
            <x-table.delete wire:click="openModal('delete-message', {{ $message->id }})"/>

        </div>
    </td>
</tr>
