<main class="volunteer-show flex-1 px-6 md:px-12 py-12 flex flex-col gap-6" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <x-admin.pages.volunteers.show.heading
            :app_title="$app_title"/>

        {{-- FORMULAIRE --}}
        <x-admin.pages.volunteers.show.form/>
    </div>

    <div class="flex flex-col gap-10 bg-white border border-gray-200 rounded-2xl p-6">
        <x-admin.pages.volunteers.show.danger-zone/>
    </div>
</main>
