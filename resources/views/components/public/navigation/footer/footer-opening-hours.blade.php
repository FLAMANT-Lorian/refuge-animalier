@php

    $opening_hours = [__('public/footer.opening_hours_1'), __('public/footer.opening_hours_2'), __('public/footer.opening_hours_3')];

@endphp

<aside
    class="md:col-start-1 lg:col-start-7 md:col-end-6 lg:col-end-10 md:row-start-2 md:row-end-3 lg:row-start-1 lg:row-end-2">
    <h3 class="text-lg font-semibold text-white pb-4">{!! __('public/footer.opening_hours') !!}</h3>
    <ul class="flex flex-col gap-2">
        @foreach($opening_hours as $opening_hour)
            <li class="text-base font-normal text-white">
                {!! $opening_hour !!}
            </li>
        @endforeach
    </ul>
</aside>
