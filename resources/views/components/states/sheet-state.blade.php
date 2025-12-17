@php
    use App\Enums\SheetsStatus;
@endphp

@props([
   'sheet_state'
])

@php
    $states  = [
        SheetsStatus::Creation->value => 'bg-orange-100 before:bg-orange-500',
        SheetsStatus::Modification->value => 'bg-blue-100 before:bg-blue-500',
        SheetsStatus::Validate->value => 'bg-green-100 before:bg-green-500',
    ];

    $classes = $states[(string)$sheet_state];
@endphp

<span {!! $attributes->merge(['class' => $classes . ' ' . 'flex items-center gap-2 px-2 py-1 rounded-2xl before:block before:content[""] before:w-[0.625rem] before:h-[0.625rem] before:rounded-full']) !!}>
            {!! $sheet_state !!}
</span>
