@php

    $items = [
        ['label'=> __('public/header.link_1'), 'title' => __('public/header.link_1_title'), 'destination' => route('public.animals.index'), 'class' => 'text-2xl md:text-base font-normal md:font-medium hover:font-bold active:font-bold transition-all'],
        ['label'=> __('public/header.link_2'), 'title' => __('public/header.link_2_title'), 'destination' => route('public.about'), 'class'=> 'text-2xl md:text-base font-normal md:font-medium hover:font-bold active:font-bold transition-all'],
        ['label'=> __('public/header.link_3'), 'title' => __('public/header.link_3_title'), 'destination' => route('public.contact'), 'class' => 'text-2xl md:text-base font-normal md:font-medium hover:font-bold active:font-bold transition-all md:last:py-2.5 md:last:px-4 md:last:bg-green-500 md:last:text-white md:last:rounded-lg md:last:hover:font-medium md:last:hover:bg-transparent md:last:hover:text-black md:last:border md:border-green-500'],
    ];

@endphp

<ul class="flex flex-col gap-6 md:flex-row md:items-center md:justify-end">
    @foreach($items as $item)
        <li class="flex">
            <x-public.navigation.header.navigation-link
                :destination="$item['destination']"
                :title="$item['title']"
                :class="$item['class']">
                {!! $item['label'] !!}
            </x-public.navigation.header.navigation-link>
        </li>
    @endforeach
</ul>
