@props([
 'animal_sheets'
])

<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($animal_sheets as $animal_sheet)
        <x-admin.pages.animal-sheets.index.tr :animal_sheet="$animal_sheet"/>
    @endforeach
</tbody>
