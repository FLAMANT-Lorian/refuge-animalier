@props([
    'animal'
])

<x-admin.partials.modal>

    <x-slot:title>
        Modifier la note de visite pour {!! $animal->name !!}
    </x-slot:title>

    <x-slot:sub_title>
        Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires
    </x-slot:sub_title>

    <x-slot:body>
        {{-- TODO : ADD MODAL CONTENT --}}
    </x-slot:body>

</x-admin.partials.modal>
