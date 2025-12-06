<main class="animals_show flex-1 py-12 px-6 md:px-12 lg:px-16 lg:py-10" id="content">

    <div class="flex flex-col gap-8 lg:p-6 lg:border lg:border-gray-200 lg:rounded-2xl lg:bg-white">

        {{-- EN TÊTE --}}
        <x-admin.pages.animals.show.heading
            :animal="$this->animal"
            :app_title="$app_title"/>

        {{-- INFORMATIONS --}}
        <x-admin.pages.animals.show.animal_informations
            :animal="$this->animal"/>

        {{-- NOTES --}}
        <x-admin.pages.animals.show.animal_notes/>

    </div>

    @if($openCreateNote)
        <x-admin.modals.animals.show.createNote/>
    @endif
</main>
