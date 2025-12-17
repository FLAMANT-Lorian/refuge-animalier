@props([
    'message'
])

<x-admin.partials.modal
    :have_sub_title="false">

    <x-slot:title>
        Message de {!! $message->full_name !!}
    </x-slot:title>

    <x-slot:body>
        {{--TODO : CONTENT OF MODAL --}}
    </x-slot:body>

</x-admin.partials.modal>
