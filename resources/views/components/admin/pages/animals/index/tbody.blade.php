@props([
 'animals'
])

<tbody>
    @foreach($animals as $index => $animal)
        <x-admin.pages.animals.index.tr :animal="$animal"/>
    @endforeach
</tbody>
