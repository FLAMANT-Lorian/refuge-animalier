@php

    $items = [
        ['icon' => 'dashboard','label'=> __('admin/navigation.dashboard'), 'title' => __('admin/navigation.dashboard_title'), 'destination' => route('admin.dashboard')],
        ['icon' => 'animals','label'=> __('admin/navigation.animals'), 'title' => __('admin/navigation.animals_title'), 'destination' => route('admin.animals.index')],
        ['icon' => 'adoption-requests','label'=> __('admin/navigation.adoption-requests'), 'title' => __('admin/navigation.adoption-requests_title'), 'destination' => route('admin.adoption-requests.index')],
        ['icon' => 'animal-sheets','label'=> __('admin/navigation.animal-sheets'), 'title' => __('admin/navigation.animal-sheets_title'), 'destination' => route('admin.animal-sheets.index')],
        ['icon' => 'messages','label'=> __('admin/navigation.messages'), 'title' => __('admin/navigation.messages_title'), 'destination' => route('admin.messages.index')],
        ['icon' => 'volunteers','label'=> __('admin/navigation.volunteers'), 'title' => __('admin/navigation.volunteers_title'), 'destination' => route('admin.volunteers.index')],
    ];

@endphp

<ul class="flex flex-col gap-6 lg:gap-4 mt-12 lg:mt-20 mb-auto">
    @foreach($items as $item)
        <li class="group">
            <x-admin.navigation.navigation-link
                :destination="$item['destination']"
                :icon="$item['icon']"
                class="lg:group-hover:text-white"
                :title="$item['title']">
                {!! $item['label'] !!}
            </x-admin.navigation.navigation-link>
        </li>
    @endforeach
</ul>
<?php
