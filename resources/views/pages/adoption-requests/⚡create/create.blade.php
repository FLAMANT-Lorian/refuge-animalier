<main class="adoption-requests-create flex-1 px-6 py-12 md:px-12 lg:px-16 lg:py-10" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <x-admin.pages.adoption-requests.create.heading
            :app_title="$app_title"/>

        {{-- FORMULAIRE --}}
        <x-admin.pages.adoption-requests.create.form/>
    </div>
</main>

