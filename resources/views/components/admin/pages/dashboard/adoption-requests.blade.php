<section
    {!! $attributes->merge(['class' => 'flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white']) !!}>
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-4">
        <div class="flex flex-col gap-1">
            <h2 class="text-lg font-semibold">
                {!! __('admin/dashboard.adoption_requests_big_title') !!}
            </h2>
            <p class="font-base font-normal text-gray-500">
                {!! __('admin/dashboard.you_have') . $this->adoption_request_count . __('admin/dashboard.new_adoption_request') !!}</p>
        </div>
        <x-buttons.base
            class="max-lg:self-start"
            :destination="route('admin.adoption-requests.index', config('app.locale'))"
            title="{!! __('admin/dashboard.adoption_requests_title') !!}">
            {!! __('admin/dashboard.adoption_requests_text') !!}
        </x-buttons.base>
    </div>
    <ul class="sheet_dashboard flex flex-col gap-4 max-h-[21.875rem] overflow-y-scroll">
        @foreach($this->adoption_requests as $adoption_request)
            <x-admin.pages.dashboard.adoption-request-card :adoption_request="$adoption_request"/>
        @endforeach()
    </ul>
</section>
