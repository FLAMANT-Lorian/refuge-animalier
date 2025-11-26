@props([
    'data'
])

<li class="relative p-4 border border-gray-200 bg-white rounded-2xl">
    {{-- TODO: OUVRIR UNE MODAL --}}
    <a title="Voir la demande de {!! $data['name'] !!}"
       href="#"
       class="hover:cursor-pointer rounded-2xl z-10 absolute top-0 bottom-0 right-0 left-0">
        <span class="sr-only">
            Voir la demande de {!! $data['name'] !!}
        </span>
    </a>
    <dl class="flex flex-col gap-4">
        <div>
            <dt class="font-bold">Nom&nbsp;:</dt>
            <dd>{!! $data['name'] !!}</dd>
        </div>
        <div>
            <dt class="font-bold">Adresse e-mail</dt>
            <dd>{!! $data['email'] !!}</dd>
        </div>
        <div class="flex flex-col gap-2 items-start">
            <p>Intéressé par</p>
            <a title="Voir la fichde de {!! $data['animal_name'] !!}"
               href="{!! route('public.animals.show', 1) !!}"
               class="relative z-20 hover:underline text-lg font-bold py-1 px-4 text-white bg-green-500 rounded-lg">
                {!! $data['animal_name'] !!}
            </a>
        </div>
    </dl>
</li>
