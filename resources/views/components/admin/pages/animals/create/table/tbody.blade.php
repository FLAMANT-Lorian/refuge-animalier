@props([
    'notes'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @for($i=0; $i < 8; $i++)
        <x-admin.pages.animals.create.table.tr :note="$notes"/>
    @endfor
</tbody>
