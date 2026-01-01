@php

    $nav_links = [
        ['label' => __('public/footer.link_1'), 'title' => __('public/footer.link_1_title'), 'destination' => route('public.homepage'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => __('public/footer.link_2'), 'title' => __('public/footer.link_2_title'), 'destination' => route('public.animals.index'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => __('public/footer.link_3'), 'title' => __('public/footer.link_3_title'), 'destination' => route('public.about'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
        ['label' => __('public/footer.link_4'), 'title' => __('public/footer.link_4_title'), 'destination' => route('public.contact'), 'class' => 'hover:cursor-pointer hover:font-bold transition-all text-base font-normal text-white'],
    ];

@endphp
<nav aria-label="{!! __('public/footer.secondary_nav') !!}"
     class="md:col-start-1 lg:col-start-1 md:col-end-6 lg:col-end-4 md:row-start-1 md:row-end-2">
    <h3 class="text-lg font-semibold text-white pb-4">{!! __('public/footer.secondary_nav') !!}</h3>
    <ul class="flex flex-col gap-2">
        @foreach($nav_links as $nav_link)
            <li>

                <x-public.navigation.header.navigation-link
                    :destination="$nav_link['destination']"
                    :title="$nav_link['title']"
                    :class="$nav_link['class']">
                    {!! $nav_link['label'] !!}
                </x-public.navigation.header.navigation-link>

            </li>
        @endforeach
    </ul>
</nav>
