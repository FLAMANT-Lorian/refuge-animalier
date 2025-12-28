<main class="adoption-requests-edit flex flex-col gap-6 flex-1 px-6 py-12 md:px-12 lg:px-16 lg:py-10" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <x-admin.pages.adoption-requests.edit.heading
            :app_title="$app_title"/>

        {{-- FORMULAIRE --}}
        <x-admin.pages.adoption-requests.edit.form/>
    </div>

    @can('delete', AdoptionRequest::class)
        <div class="flex flex-col gap-10 bg-white border border-gray-200 rounded-2xl p-6">
            <x-admin.pages.adoption-requests.edit.danger-zone
                :adoption_request="$adoption_request"/>
        </div>
    @endcan

    @if($openDeleteAdoptionRequest)
        <x-admin.modals.adoptionRequests.adoption-request-delete
            :adoption_request="$adoptionRequestToDelete"/>
    @endif
</main>

