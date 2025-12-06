@props([
    'animal'
])

<x-admin.partials.modal
    :have_sub_title="false">

    <x-slot:title>
        Supprimer la note pour {!! $animal->name !!}
    </x-slot:title>

    <x-slot:body>
        {{-- TODO : ADD MODAL CONTENT --}}
    </x-slot:body>

</x-admin.partials.modal>
