
@props([
    'app_title'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row gap-1 items-center">
                –
                <a wire:navigate
                   class="text-gray-500"
                   title="Vers la page des animaux"
                   href="{!! route('admin.animals.index') !!}">
                    Animaux
                </a>
                →
                <a wire:navigate
                   class="text-gray-500 font-bold hover:underline"
                   title="Vers la page de création d’une nouvelle fiche animal"
                   href="{!! route('admin.animals.create') !!}">
                    {!! $app_title !!}
                </a>
    </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p class="text-gray-500 text-base">Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires</p>
    </div>
</section>
