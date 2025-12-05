<main class="animals_show flex-1 py-12 px-6 md:px-12 lg:px-16 lg:py-10" id="content">

    <div class="flex flex-col gap-8 lg:p-6 lg:border lg:border-gray-200 lg:rounded-2xl lg:bg-white">

        {{-- EN TÊTE --}}
        <x-admin.pages.animals.create.heading
            :animal="$this->animal"
            :app_title="$app_title"/>

        {{-- INFORMATIONS --}}
        <x-admin.pages.animals.create.animal_informations
            :animal="$this->animal"/>

        {{-- NOTES --}}
        <x-admin.pages.animals.create.animal_notes/>

    </div>
</main>
