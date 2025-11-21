@props([
    'animal'
])

<div class="flex flex-col gap-6 mb-8">
    <div class="flex gap-4 justify-between items-center">
        <div class="flex flex-wrap items-center gap-4">
            <h3 class="text-3xl font-bold">
                {!! $animal->name !!}
            </h3>
            <x-animals.state :animal_state="$animal->state"/>
        </div>
        <a class="flex flex-row gap-2 transition-all p-2 rounded-lg border border-transparent hover:border-gray-100 hover:bg-white"
           href="{!! url()->current() !!}">
            Partager
            <x-icons.share/>
        </a>
    </div>
    <p>
        {!! $animal->description !!}
    </p>
</div>
