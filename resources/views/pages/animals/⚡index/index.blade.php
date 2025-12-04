<main class="animals_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <x-admin.pages.animals.heading.section
        :app_title="$app_title"/>

        {{-- TABLEAU DES ANIMAUX --}}
        <x-admin.pages.animals.index.table
            class="lg:col-start-1 lg:col-end-10"
            :animals="$this->animals"/>

    </div>
</main>

