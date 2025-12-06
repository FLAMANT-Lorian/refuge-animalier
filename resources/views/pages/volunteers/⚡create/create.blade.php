<main class="volunteer-create flex-1 px-6 py-12 md:px-12 lg:px-16 lg:py-10" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <x-admin.pages.volunteers.create.heading
            :app_title="$app_title"/>

        {{-- FORMULAIRE --}}
        <x-admin.pages.volunteers.create.form/>
    </div>

    @if($openDeleteVolunteerAvatar)
        <x-admin.modals.volunteers.delete-volunteer-avatar/>
    @endif
</main>
