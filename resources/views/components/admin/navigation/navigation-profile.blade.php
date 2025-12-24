@props([
    'profile_data'
])
<div class="menu_profile relative flex justify-between items-center">
    <div class="flex items-center gap-2">
        <figure class="w-[3.125rem] h-[3.125rem] rounded-full overflow-hidden">
            <img src="{!! asset('assets/img/avatar.png') !!}"
                 alt="Photo de profile de {{ auth()->user()->full_name }}">
        </figure>
        <div class="flex flex-col">
            <span class="underline_text relative font-base font-semibold">
                {{ auth()->user()->full_name }}
            </span>
            <span class="text-sm font-medium text-gray-600">
                {{ __('enum.' . auth()->user()->role) }}
            </span>
        </div>
    </div>
    <x-icons.settings
        class="settings"/>
    <a wire:navigate
       title="{{ __('admin/navigation.settings_title') }}"
       class="absolute top-0 bottom-0 left-0 right-0 group" href="{!! route('admin.settings') !!}">
        <span class="sr-only">
            {{ __('admin/navigation.settings_title') }}
        </span>
    </a>
</div>
