@props([
    'animal'
])

<tr scope="row" class="flex w-full bg-white items-center nth-of-type-[odd]:bg-gray-50 nth-of-type-[even]:bg-white">
    <td class="flex justify-center p-2 w-[3rem]">
        <input class="animal_{!! $animal->id !!} hover:cursor-pointer" type="checkbox" name="animal_{!! $animal->id !!}"
               id="animal_{!! $animal->id !!}"
               title="Séléctionner l'animal">
        <label for="animal_{!! $animal->id !!}" class="sr-only">Séléctionner l'animal</label>
    </td>
    <td class="hidden">
        <span class="font-semibold">
            Image de l’animal
        </span>
        Image de {!! $animal->name !!}
    </td>
    <td class="flex-1 text-left font-normal">
        <div class="px-4 py-2.5">
            <a wire:navigate
               class="hover:underline"
               title="Vers la page de pedro"
               href="{!! route('admin.animals.show', 1) !!}">
                {!! $animal->name !!}
            </a>
        </div>
    </td>
    <td class="flex-1 text-left">
        <div class="px-4 py-2.5">
            <span class="font-normal">
                {!! $animal->breed !!}
            </span>
        </div>
    </td>
    <td class="flex-1 text-left">
        <div class="flex justify-items-start px-4 py-2.5">
            <x-states.animal-state
                :animal_state="$animal->state"/>
        </div>
    </td>
    <td class="text-right font-medium w-[9.375rem]">
        <div class="px-4 py-2.5">
            Actions
        </div>
    </td>
</tr>
