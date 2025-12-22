@props([
    'animal'
])

<x-admin.partials.modal>

    <x-slot:title>
        Demande pour modifier {!! $animal->name !!}
    </x-slot:title>

    <x-slot:sub_title>
        Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires
    </x-slot:sub_title>

    <x-slot:body>
        {{-- TODO : ADD MODAL CONTENT --}}
    </x-slot:body>

</x-admin.partials.modal>
