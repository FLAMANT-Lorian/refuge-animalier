@props([
    'animal'
])

<x-admin.partials.modal
    :have_sub_title="false">

    <x-slot:title>
        Supprimer l’animal ({!! $animal->name !!})
    </x-slot:title>

    <x-slot:body>
        {{-- TODO: CONTENT OF MODAL --}}
    </x-slot:body>

</x-admin.partials.modal>
