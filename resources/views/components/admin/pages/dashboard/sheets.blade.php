<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h2 class="text-lg font-semibold">
                {{ __('admin/dashboard.sheets_title') }}
            </h2>
            <p class="font-base font-normal text-gray-500">{{ __('admin/dashboard.you_still_have') . $this->sheet_count . __('admin/dashboard.files_to_be_validated') }}</p>
        </div>
        <x-buttons.base
            class="max-lg:self-start"
            :destination="route('admin.animal-sheets.index', config('app.locale'))"
            title="{{ __('admin/dashboard.sheet_text') }}">
            {{ __('admin/dashboard.sheet_title') }}
        </x-buttons.base>
    </div>
    <ul class="sheet_dashboard flex flex-col gap-4 max-h-[21.875rem] overflow-y-scroll">
        @foreach($this->animal_sheets as $sheet)
            <x-admin.pages.dashboard.sheets-card :sheet="$sheet"/>
        @endforeach
    </ul>
</section>
