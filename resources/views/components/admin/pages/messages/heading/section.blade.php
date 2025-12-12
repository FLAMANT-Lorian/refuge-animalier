@props([
    'app_title'
])

<section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

    {{-- FIL D'ARIANE --}}
    <a title="{!! __('admin/messages.breadcrumb_title') !!}"
       wire:navigate
       href="{!! route('admin.messages.index', config('app.locale')) !!}"
       class="self-start font-bold text-gray-500">
        – {!! $app_title !!}
    </a>

    <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
        <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
            <h2 class="text-2xl font-bold">{!! __('admin/messages.title') !!}</h2>
            <p class="text-base text-gray-500">{!! __('admin/dashboard.you_have') !!}
                3 {!! __('admin/messages.unread_messages') !!}</p>
        </div>

        {{-- ACTIONS --}}
        <x-admin.pages.messages.heading.actions/>
    </div>

</section>
