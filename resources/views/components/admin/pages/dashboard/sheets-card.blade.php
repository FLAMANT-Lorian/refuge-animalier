@props([
    'sheet'
])

<li wire:click="openModal('animal-sheet', {{ $sheet->id }})"
    class="hover:cursor-pointer relative p-4 border border-green-300 bg-white hover:bg-green-100 rounded-2xl transition-all ease-in-out duration-200 md:flex md:justify-between md:items-center md:gap-4">
    <dl class="flex flex-col md:flex-row gap-4">
        <div
            class="md:flex md:flex-row md:gap-4 md: items-center md:order-2 md:before:block md:before:content[''] md:before:h-5 md:before:w-0.5 md:before:bg-gray-100">
            <dt class="font-bold pb-1  md:sr-only">{{ __('admin/dashboard.single_sheet_animal') }}&nbsp;:</dt>
            <dd class="md:font-bold">
                @if($sheet->animal)
                    <a wire:navigate
                       class="relative z-20 hover:underline"
                       title="{{ __('admin/dashboard.single_sheet_animal_title') . $sheet->animal->id }}"
                       href="{{ route('admin.animals.show', ['animal' => $sheet->animal->id, 'locale' => config('app.locale')]) }}">
                        {{ $sheet->animal->name }}
                    </a>
                @endif
            </dd>
        </div>
        <div>
            <dt class="font-bold pb-1 md:sr-only">{!! __('admin/dashboard.single_sheet_date') !!}&nbsp;:</dt>
            <dd>{{ $sheet->translatedFormatDate }}</dd>
        </div>
        @if($sheet->animal)
            <div class="md:order-3">
                <dt class="font-bold pb-1  md:sr-only">{{ __('admin/dashboard.single_adoption_request_breed') }}
                    &nbsp;:
                </dt>
                <dd class="md:text-gray-500">{{ $sheet->animal->breed->name }}
                    <strong>({{ __('enum.' . $sheet->animal->breed->species->name)}})</strong></dd>
            </div>
        @else
            <span class="md:order-3">–</span>
        @endif
    </dl>
    <x-states.sheet-state
        class="absolute md:static top-4 right-4"
        :sheet_state="$sheet->status"/>
</li>
