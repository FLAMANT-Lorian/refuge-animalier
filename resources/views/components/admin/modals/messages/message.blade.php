@props([
    'message'
])

<x-admin.partials.modal
    :have_sub_title="false">

    <x-slot:title>
        Message de <strong>{{ $message->full_name }}</strong>
    </x-slot:title>

    <x-slot:body>
        <div class="flex flex-col gap-2">
            <div class="flex flex-row gap-1">
                <span class="font-base font-bold">{{ __('admin/login.email') }}&nbsp;:</span>
                <span class="font-base">{{ $message->email }}</span>
            </div>
            <div class="flex flex-row gap-1">
                <span class="font-base font-bold">{{ __('forms.object') }}&nbsp;:</span>
                <p class="font-base">{{ $message->object }}</p>
            </div>
            <div>
                <span class="font-bold">{{ __('forms.communication') }}&nbsp;:</span>
                <p class="font-base wrap-break-word">{{ $message->message }}</p>
            </div>
            <div class="mt-4 self-end flex flex-row gap-4">
                <button
                    wire:click="markAsNotRead({{ $message->id }})"
                    class="font-medium px-4 py-[0.625rem] rounded-lg bg-gray-50 border border-gray-100 hover:bg-gray-100 cursor-pointer trans-all"
                    type="button"
                    title="{{ __('admin/messages.mark_as_not_read') }}">
                    {{ __('admin/messages.mark_as_not_read') }}
                </button>
                <a class="text-center font-medium px-4 py-[0.625rem] bg-green-500 rounded-lg text-white hover:text-black hover:bg-transparent border border-green-500 transition-all"
                   title="{{ __('admin/messages.reply') }}"
                   href="mailto::{{ $message->email }}">{{ __('admin/messages.reply') }}</a>
            </div>
        </div>

    </x-slot:body>

</x-admin.partials.modal>
