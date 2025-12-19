@props([
    'messages'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($messages as $message)
        <x-admin.pages.messages.index.tr :message="$message"/>
    @endforeach
</tbody>
