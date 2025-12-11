<main class="animal-edit flex flex-col gap-6 flex-1 px-6 py-12 md:px-12 lg:px-16 lg:py-10" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <x-admin.pages.animals.edit.heading
            :app_title="$app_title"
            :animal="$animal"/>

        {{-- FORMULAIRE --}}
        <x-admin.pages.animals.edit.form
            :animal="$animal"/>
    </div>

    <div class="flex flex-col gap-10 bg-white border border-gray-200 rounded-2xl p-6">
        <x-admin.pages.animals.edit.danger-zone
        :animal="$animal"/>
    </div>

    @if($openAddBreed)
        <x-admin.modals.animals.edit.addBreed/>
    @elseif($openDeleteAnimal)
        <x-admin.modals.animals.edit.deleteAnimal
            :animal="$animalToDelete"/>
    @endif
</main>
