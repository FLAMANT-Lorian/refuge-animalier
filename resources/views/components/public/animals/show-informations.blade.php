@props([
    'animal'
])

<div>
    <h4 class="flex items-center gap-4 text-xl font-semibold pb-4">
        <x-icons.paw class="p-1.5 border border-green-500 bg-green-100 rounded-lg"/>
        Informations sur l’animal
    </h4>
    <ul class="flex flex-col gap-4 min-[600px]:grid min-[600px]:grid-cols-2">
        <x-public.animals.information-card title="Race" :data="$animal->breed"/>
        <x-public.animals.information-card title="Sexe" :data="$animal->sex"/>
        <x-public.animals.information-card title="Pelage" :data="$animal->color"/>
        <x-public.animals.information-card title="Âge" :data="$animal->age"/>
    </ul>
</div>
