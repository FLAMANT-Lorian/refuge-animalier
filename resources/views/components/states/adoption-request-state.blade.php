@php
    use \App\Enums\AdoptionRequestsStatus;
@endphp

@props([
   'adoption_request_state'
])

@php
    $states  = [
        AdoptionRequestsStatus::Closed->value => 'bg-blue-100 before:bg-blue-500',
        AdoptionRequestsStatus::InWay->value => 'bg-green-100 before:bg-green-500',
        AdoptionRequestsStatus::Awaiting->value => 'bg-orange-100 before:bg-orange-500',
        AdoptionRequestsStatus::Refused->value => 'bg-red-100 before:bg-red-500',
    ];

    $classes = $states[(string)$adoption_request_state];
@endphp

<span {!! $attributes->merge(['class' => $classes . ' ' . 'font-normal flex items-center gap-2 px-2 py-1 rounded-2xl before:block before:content[""] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full']) !!}>
            {!! $adoption_request_state !!}
</span>
