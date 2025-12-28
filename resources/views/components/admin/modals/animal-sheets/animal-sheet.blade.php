@props([
    'sheet'
])

@php
    use App\Enums\SheetsStatus;
@endphp

<x-admin.partials.modal
    :delete_modal="true"
    :have_sub_title="false">

    <x-slot:title>
        @if($sheet->status === SheetsStatus::Validate->value)
            {{ __('admin/animal-sheets.sheet_already_validated') }}
        @else
            {{ __('enum.' . $sheet->status ) . __('admin/animal-sheets.sheet')}}
        @endif
    </x-slot:title>

    <x-slot:body>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-1">
                <span class="font-semibold font-base">{{ __('admin/animal-sheets.message') }}</span>
                <p class="font-base">
                    {{ $sheet->message }}
                </p>
            </div>
            @if($sheet->status !== SheetsStatus::Validate->value)
                <button wire:click="changeStatus({{ $sheet->id }})"
                        class="trans-all cursor-pointer font-medium px-4 py-2.5 rounded-lg border border-green-500 hover:bg-green-500 hover:text-white"
                        type="button">
                    {{ __('admin/animal-sheets.sheet_btn') }}
                </button>
            @endif
        </div>
    </x-slot:body>

</x-admin.partials.modal>
