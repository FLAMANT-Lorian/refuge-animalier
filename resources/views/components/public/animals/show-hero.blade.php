@props([
    'animal'
])

<div class="flex flex-col gap-6 mb-8">
    <div class="flex gap-4 justify-between items-center">
        <div class="flex flex-wrap items-center gap-4">
            <h3 class="text-3xl font-bold">
                {!! $animal->name !!}
            </h3>
            <x-states.animal-state :animal_state="$animal->state"/>
        </div>
        <div class="relative">
            <a
                title="{!! __('public/animals.show_share_title') !!}"
                class="share_button flex flex-row gap-2 transition-all p-2 rounded-lg border border-transparent hover:border-gray-100 hover:bg-white"
                href="{!! url()->current() !!}">
                {!! __('public/animals.show_share_title') !!}
                <x-icons.share/>
            </a>
            <span
                class="opacity-0 transition-all ease-in-out duration-100 share_message absolute right-0 -top-7 -rotate-2 font-bold">
                {!! __('public/animals.show_share_message') !!}
            </span>
        </div>
    </div>
    <p>
        {!! $animal->description !!}
    </p>
</div>
