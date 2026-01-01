@props([
    'destination',
    'title',
    'icon',
    'count' => ''
])

@php
    $class_for_icons = 'hidden lg:block group-hover:text-white transition-all ease-in-out duration-200';
@endphp<a wire:navigate wire:current="active_btn max-lg:font-bold lg:text-white lg:bg-green-500 lg:border-green-500"
          {!! $attributes->merge(['class' => 'lg:self-auto lg:px-4 lg:py-3 lg:rounded-lg lg:border lg:border-transparent lg:hover:border-green-500 lg:hover:bg-green-500 transition-all ease-in-out duration-200 flex items-center gap-4 lg:flex-row lg:gap-2 text-xl lg:text-base max-lg:hover:font-bold font-medium font-normal transition-all']) !!}href="{!! $destination !!}"
          title="{!! $title !!}">
    @switch($icon)
        @case('dashboard')
            <x-icons.dashboard :class="$class_for_icons"/>
            @break

        @case('animals')
            <x-icons.animals :class="$class_for_icons"/>
            @break

        @case('adoption-requests')
            <x-icons.adoption-requests :class="$class_for_icons"/>
            @break

        @case('animal-sheets')
            <x-icons.animal-sheets :class="$class_for_icons"/>
            @break

        @case('messages')
            <x-icons.messages :class="$class_for_icons"/>
            @break

        @case('volunteers')
            <x-icons.volunteers :class="$class_for_icons"/>
            @break

    @endswitch
    {!! $slot !!}

    @if(!empty($count))
        <span class="min-lg:ml-auto py-[1px] px-2 bg-red-200 border border-red-300 rounded-lg !text-base !text-black">
        {{ $count }}
        </span>
    @endif
</a>
