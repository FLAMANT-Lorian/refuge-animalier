@props([
    'animal'
])

<div>
    <h4 class="flex items-center gap-4 text-xl font-semibold pb-4">
        <x-icons.paw class="p-1.5 border border-green-500 bg-green-100 rounded-lg"/>
        {!! __('public/animals.show_animals_details_title') !!}
    </h4>
    <ul class="flex flex-col gap-4 min-[600px]:grid min-[600px]:grid-cols-2">
        <x-public.animals.information-card :title="__('forms.breed')" :data="$animal->breed->name"/>
        <x-public.animals.information-card :title="__('forms.sex')" :data="__('enum.' . $animal->sex)"/>
        <x-public.animals.information-card :title="__('forms.color')" :data="$animal->coat"/>
        <x-public.animals.information-card :title="__('forms.age')" :data="$animal->age . ' ans'"/>
    </ul>
</div>
