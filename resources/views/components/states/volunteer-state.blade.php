@php
    use App\Enums\VolunteerStatus;
@endphp

@props([
   'volunteer_state'
])

@php
    $states  = [
        VolunteerStatus::Active->value => 'bg-green-100 before:bg-green-500',
        VolunteerStatus::Parts->value => 'bg-red-100 before:bg-red-500',
        VolunteerStatus::InBreak->value => 'bg-blue-100 before:bg-blue-500',
    ];

    $classes = $states[(string)$volunteer_state];
@endphp

<span {!! $attributes->merge(['class' => $classes . ' ' . 'font-normal flex items-center gap-2 px-2 py-1 rounded-2xl before:block before:content[""] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full']) !!}>
            {{ __('enum.' . $volunteer_state) }}
</span>
