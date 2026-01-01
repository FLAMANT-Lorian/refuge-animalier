@php
    use \App\Enums\DateRange;
@endphp

<section {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col md:flex-row gap-4">
        <h2 class="text-lg font-semibold">
            {!! __('admin/dashboard.stats_title') !!}
        </h2>
        <x-buttons.download-button
            class="md:ml-auto"
            destination="#"
            :title="__('admin/dashboard.download_sheet_title')">
            {!! __('admin/dashboard.download_sheet_text') !!}
        </x-buttons.download-button>
        <x-forms.fields.select-filter
            :all_selector="false"
            id="stats_filter"
            name="stats_filter"
            :label="__('admin/dashboard.stats_filter_text')"
            :with_label="false"
            :collection="DateRange::cases()"
            identifier="value"/>
    </div>

    {{-- STATS --}}
    <x-admin.pages.dashboard.statistics-cards/>
</section>
