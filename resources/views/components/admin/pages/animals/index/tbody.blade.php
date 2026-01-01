@props([
 'animals'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($animals as $index => $animal)
        <x-admin.pages.animals.index.tr :animal="$animal"/>
    @endforeach
</tbody>
