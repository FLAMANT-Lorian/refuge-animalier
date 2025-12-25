<tbody class="flex flex-col gap-6 min-[750px]:grid min-[750px]:grid-cols-2 min-[1100px]:grid-cols-3 lg:block">
    @foreach($this->notes as $note)
        <x-admin.pages.animals.show.table.tr
            :note="$note"/>
    @endforeach
</tbody>
