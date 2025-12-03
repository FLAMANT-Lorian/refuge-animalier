@props([
    'data'
])

<li class="relative p-4 border border-green-300 hover:bg-green-100 transition-all ease-in-out duration-200 bg-white rounded-2xl">
    {{-- TODO: OUVRIR UNE MODAL --}}
    <dl class="flex flex-col md:flex-row gap-4">
        <div class="flex flex-col gap-4 md:gap-0">
            <div>
                <dt class="md:sr-only pb-1 font-bold">Nom&nbsp;:</dt>
                <dd class="md:font-bold">{!! $data['name'] !!}</dd>
            </div>
            <div>
                <dt class="md:sr-only pb-1 font-bold">Adresse e-mail&nbsp;:</dt>
                <dd>{!! $data['email'] !!}</dd>
            </div>
        </div>
        <div class="md:ml-auto flex flex-col md:flex-row md:items-center gap-2 items-start">
            <p>Intéressé par</p>
            <a title="Voir la fichde de {!! $data['animal_name'] !!}"
               href="{!! route('admin.animals.show', 1) !!}"
               class="relative z-20 hover:underline text-lg font-bold py-1 px-4 text-white bg-green-500 rounded-lg">
                {!! $data['animal_name'] !!}
            </a>
        </div>
    </dl>
</li>
