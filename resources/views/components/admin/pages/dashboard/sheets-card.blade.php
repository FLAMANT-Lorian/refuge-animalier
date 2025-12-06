@props([
    'data'
])

<li wire:click="openModal('animal-sheet')"
    class="hover:cursor-pointer relative p-4 border border-green-300 bg-white hover:bg-green-100 rounded-2xl transition-all ease-in-out duration-200 md:flex md:justify-between md:items-center md:gap-4">
    <dl class="flex flex-col md:flex-row gap-4">
        <div
            class="md:flex md:flex-row md:gap-4 md: items-center md:order-2 md:before:block md:before:content[''] md:before:h-5 md:before:w-0.5 md:before:bg-gray-100">
            <dt class="font-bold pb-1  md:sr-only">Animal&nbsp;:</dt>
            <dd class="md:font-bold">
                <a wire:navigate
                   class="relative z-20 hover:underline"
                   title="Vers la fiche de {!! $data['name'] !!}"
                   href="{!! route('admin.animals.show', 1) !!}">
                    {!! $data['name'] !!}
                </a>
            </dd>
        </div>
        <div>
            <dt class="font-bold pb-1 md:sr-only">Date&nbsp;:</dt>
            <dd>{!! $data['date'] !!}</dd>
        </div>
        <div class="md:order-3">
            <dt class="font-bold pb-1  md:sr-only">Race&nbsp;:</dt>
            <dd class="md:text-gray-500">{!! $data['breed'] !!}</dd>
        </div>
    </dl>
    <x-states.sheet-state
        class="absolute md:static top-4 right-4"
        :sheet_state="$data['state']"/>
</li>
