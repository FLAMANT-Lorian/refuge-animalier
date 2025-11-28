@php
    use App\Enums\AnimalStatus;
@endphp

@props([
   'animal_state'
])

@php
    $states  = [
        AnimalStatus::ProcessOfAdoption->value => 'bg-green-100 before:bg-green-500',
        AnimalStatus::AwaitingAdoption->value => 'bg-orange-100 before:bg-orange-500',
    ];

    $classes = $states[(string)$animal_state];
@endphp

<span {!! $attributes->merge(['class' => $classes . ' ' . 'flex items-center gap-2 px-2 py-1 rounded-2xl before:block before:content[""] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full']) !!}>
            {!! $animal_state !!}
</span>
