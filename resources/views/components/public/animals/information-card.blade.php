@props([
    'title',
    'data'
])

<li class="flex flex-col gap-2 p-4 bg-gray-50 border border-gray-200 rounded-lg">
    <span class="font-base font-normal">{!! $title !!}</span>
    <span class="text-lg font-bold">{!! $data !!}</span>
</li>
