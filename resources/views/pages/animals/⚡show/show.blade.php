<main class="animals_show flex-1 px-6 md:px-12 py-12 lg:px-16 lg:py-10" id="content">

    <div class="flex flex-col gap-8 lg:p-6 lg:border lg:border-gray-200 lg:rounded-2xl lg:bg-white">

        {{-- EN TÊTE --}}
        <x-admin.pages.animals.show.heading
            :animal="$animal"
            :app_title="$app_title"/>

        {{-- INFORMATIONS --}}
        <x-admin.pages.animals.show.animal_informations
            :animal="$animal"/>

        {{-- NOTES --}}
        <x-admin.pages.animals.show.animal_notes/>

    </div>

    @if($openCreateNote)
        <x-admin.modals.animals.show.createNote
        :animal="$animalToAddNote"/>
    @elseif($openEditNote)
        <x-admin.modals.animals.show.editNote
            :note="$noteToEdit"/>
    @elseif($openDeleteNote)
        <x-admin.modals.animals.show.deleteNote
            :note="$noteToDelete"/>
    @elseif($openUpdateRequest)
        <x-admin.modals.animals.show.updateRequest
            :animal="$animalToAskToUpdate"/>
    @endif
</main>
