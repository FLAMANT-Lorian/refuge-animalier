@php
    use App\Enums\MessageStatus;
@endphp

@props([
   'message_state'
])

@php
    $states  = [
        MessageStatus::unread->value => 'bg-blue-100 before:bg-blue-500',
        MessageStatus::read->value => 'bg-green-100 before:bg-green-500',
    ];

    $classes = $states[(string)$message_state];
@endphp

<span {!! $attributes->merge(['class' => $classes . ' ' . 'font-normal flex items-center gap-2 px-2 py-1 rounded-2xl before:block before:content[""] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full']) !!}>
            {!! $message_state !!}
</span>
