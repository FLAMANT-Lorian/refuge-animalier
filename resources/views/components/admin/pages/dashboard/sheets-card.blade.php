@props([
    'data'
])

<li class="relative p-4 border border-gray-200 bg-white rounded-2xl">
    {{-- TODO: OUVRIR UNE MODAL --}}
    <a href="#"
       class="hover:cursor-pointer rounded-2xl z-10 absolute top-0 bottom-0 right-0 left-0">
        <span class="sr-only">
            Statut de la fiche de {!! $data['animal'] !!}
        </span>
    </a>
    <dl class="flex flex-col gap-4">
        <div>
            <dt class="font-bold">Animal</dt>
            <dd>
                <a class="relative z-20 hover:underline"
                   title="Vers la fiche de {!! $data['animal'] !!}"
                   href="{!! route('admin.animals.show', 1) !!}">
                    {!! $data['animal'] !!}
                </a>
            </dd>
        </div>
        <div>
            <dt class="font-bold">Date</dt>
            <dd>{!! $data['date'] !!}</dd>
        </div>
        <div>
            <dt class="font-bold">Race</dt>
            <dd>{!! $data['breed'] !!}</dd>
        </div>
    </dl>
    <x-states.sheet-state
        class="absolute top-4 right-4"
        :sheet_state="$data['state']"/>
</li>
