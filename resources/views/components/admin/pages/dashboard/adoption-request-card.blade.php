@props([
    'adoption_request'
])

<li class="hover:cursor-pointer relative p-4 border border-green-300 hover:bg-green-100 transition-all ease-in-out duration-200 bg-white rounded-2xl">
    <dl class="flex flex-col items-center md:flex-row gap-4">
        <div class="flex flex-col gap-4 md:gap-0">
            <div>
                <dt class="md:sr-only pb-1 font-bold">
                    {{ __('admin/dashboard.single_adoption_request_name') }}&nbsp;:
                </dt>
                <dd class="md:font-bold">{{ $adoption_request->full_name }}</dd>
            </div>
            <div>
                <dt class="md:sr-only pb-1 font-bold">
                    {{ __('admin/dashboard.single_adoption_request_email') }}&nbsp;:
                </dt>
                <dd>{{ $adoption_request->email }}</dd>
            </div>
        </div>
        <div class="justify-end md:ml-auto flex flex-wrap flex-col md:flex-row md:items-center gap-2 items-start">
            <p>{{ __('admin/dashboard.interested_by') }}</p>
            <a wire:navigate
               title="{{ __('admin/dashboard.single_adoption_request_animal_title') . ' ' . $adoption_request->animal->name }}"
               href="{{ route('admin.animals.show', ['animal' => $adoption_request->animal->id, 'locale' => config('app.locale')]) }}"
               class="relative z-10 hover:underline text-lg font-bold py-1 px-4 text-white bg-green-500 rounded-lg">
                {{ $adoption_request->animal->name }}
            </a>
        </div>
    </dl>
    <a class="absolute inset-0 rounded-2xl"
       title="Vers la demande d’adoption"
       href="{{ route('admin.adoption-requests.edit', ['locale' => app()->getLocale(), 'adoption_request' => $adoption_request]) }}">
        <span class="sr-only">Voir la demande d’adoption</span>
    </a>
</li>
