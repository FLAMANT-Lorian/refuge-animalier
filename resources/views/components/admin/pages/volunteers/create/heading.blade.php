@props([
    'app_title'
])

<section class="flex flex-col gap-4">

    {{-- FIL D'ARIANE --}}
    <span class="flex flex-row gap-1 items-center">
                ·
                <a class="text-gray-500"
                   title="Vers la page des bénévoles"
                   href="{!! route('admin.volunteers.index') !!}">
                    Bénévoles
                </a>
                →
                <a class="text-gray-500 font-bold hover:underline"
                   title="Vers la page de création d’un bénévole"
                   href="{!! route('admin.volunteers.create') !!}">
                    {!! $app_title !!}
                </a>
            </span>

    <div class="flex flex-col gap-1">
        <h2 class="text-2xl font-bold">{!! $app_title !!}</h2>
        <p>Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires</p>
    </div>
</section>
