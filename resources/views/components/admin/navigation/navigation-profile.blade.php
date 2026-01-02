<div class="menu_profile relative flex justify-between items-center">
    <div class="flex items-center gap-2">
        @if(auth()->user()->avatar_path)
            <img alt="{!! __('admin/settings.avatar_alt') !!}"
                 class="rounded-full h-15 w-15"
                 src="{{ asset('storage/avatars/variant/60x60/' . auth()->user()->avatar_path) }}">
        @else
            <div class="rounded-full h-15 w-15 p-3 bg-gray-100">
                <img alt="{!! __('admin/settings.avatar_alt') !!}"
                     src="{!! asset('assets/img/default-avatar.svg') !!}">
            </div>
        @endif
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
        svgClass="settings"
        class="overflow-hidden"/>
    <a wire:navigate
       title="{{ __('admin/navigation.settings_title') }}"
       class="absolute top-0 bottom-0 left-0 right-0 group"
       href="{!! route('admin.settings', ['locale' => app()->getLocale()]) !!}">
        <span class="sr-only">
            {{ __('admin/navigation.settings_title') }}
        </span>
    </a>
</div>
