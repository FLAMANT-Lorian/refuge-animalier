@props([
    'app_title',
    'animal'
])

<section class="flex flex-col gap-4">
    <span class="flex flex-row gap-1 items-center text-gray-500">
                –
                <a wire:navigate
                   class="text-gray-500"
                   title="Vers la page des animaux"
                   href="{!! route('admin.animals.index', ['locale' => config('app.locale')]) !!}">
                    Animaux
                </a>
                →
                <a wire:navigate
                   class="text-gray-500 font-bold hover:underline"
                   title="Vers la page de l’animal"
                   href="{!! route('admin.animals.show', ['animal' => $animal->id, 'locale' => config('app.locale')]) !!}">
                    {!! $app_title !!}
                </a>
    </span>
    <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">
        <div>
            <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
            <p class="font-base text-gray-500">Toutes les informations sur {!! $animal->name !!}</p>
        </div>
        <x-buttons.base
            class="self-start md:self-center"
            :destination="route('admin.animals.edit', ['animal' => $animal->id, 'locale' => config('app.locale')])"
            title="Modifier la page de {!! $animal->name !!}">
            Modifier la fiche de {!! $animal->name !!}
        </x-buttons.base>
    </div>
</section>
