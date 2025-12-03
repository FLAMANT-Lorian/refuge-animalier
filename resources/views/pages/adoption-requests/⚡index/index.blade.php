@php
    use App\Enums\AdoptionRequestsStatus;
@endphp

<main class="messages_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.adoption-requests.index') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}</a>

            <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
                <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
                    <h2 class="text-2xl font-bold">Demandes d’adoptions</h2>
                    <p class="text-gray-500">Vous avez actuellement 6 demandes en cours</p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

                    {{-- CHAMPS DE RECHERCHE --}}
                    <x-forms.input-search
                        class="md:order-1"
                        name="adoption-requests_search"
                        id="adoption-requests_search"
                        label="Rechercher une demande"
                        placeholder="Rechercher une demande"
                    />

                    {{-- SELECTION DES FILTRES --}}
                    <x-forms.select
                        container_classes="md:order-3"
                        :all_selector="true"
                        all_selector_label="Toutes"
                        id="adoption-requests_filter"
                        label="Filtrer les demandes"
                        :with_label="false"
                        name="adoption-requests_filter"
                        :collection="AdoptionRequestsStatus::cases()"
                        identifier="value"
                    />
                </div>
            </div>

        </section>

        {{-- TABLEAU DES ANIMAUX --}}
        <x-admin.pages.adoption-requests.index.table
            class="lg:col-start-1 lg:col-end-10"
            :adoption_requests="$this->adoption_requests"/>

    </div>
</main>


