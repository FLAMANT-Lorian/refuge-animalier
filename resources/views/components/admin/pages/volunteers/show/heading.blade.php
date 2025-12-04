@props([
    'app_title'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row gap-1 items-center">
                ·
                <a wire:navigate
                   class="hover:underline"
                   title="Vers la page des bénévoles"
                   href="{!! route('admin.volunteers.index') !!}">
                    Bénévoles
                </a>
                →
                <a wire:navigate
                   class="font-bold hover:underline"
                   title="Vers la page du bénévole"
                   href="{!! route('admin.volunteers.show', 1) !!}">
                    {!! $app_title !!}
                </a>
            </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p>Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires</p>
    </div>
</section>
