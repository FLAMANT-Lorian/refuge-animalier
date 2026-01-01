@props([
 'volunteers'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($volunteers as $volunteer)
        <x-admin.pages.volunteers.index.tr :volunteer="$volunteer"/>
    @endforeach
</tbody>
