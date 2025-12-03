@php
    use \App\Enums\VolunteerStatus;
@endphp

<main class="messages_index flex-1" id="content">

    <div class="flex flex-col gap-8 px-6 py-12 md:px-12 lg:px-16 lg:py-10 lg:grid lg:grid-cols-9 lg:gap-6">

        {{-- EN TÊTE --}}
        <section class="flex flex-col gap-4 lg:col-start-1 lg:col-end-10">

            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.volunteers.index') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}</a>

            <div class="flex flex-col lg:grid lg:grid-cols-9 lg:items-center lg:gap-6 gap-6">
                <div class="flex flex-col gap-2 lg:col-start-1 lg:col-end-5">
                    <h2 class="text-2xl font-bold">Bénévoles</h2>
                    <p class="text-gray-500">Votre refuge comporte 12 bénévoles !</p>
                </div>

                <div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

                    {{-- CHAMPS DE RECHERCHE --}}
                    <x-forms.input-search
                        class="md:order-1"
                        name="volunteer_search"
                        id="volunteer_search"
                        label="Rechercher un bénévole"
                        placeholder="Rechercher un bénévole"
                    />

                    {{-- SELECTION DES FILTRES --}}
                    <x-forms.select
                        container_classes="md:order-3"
                        :all_selector="true"
                        all_selector_label="Tous"
                        id="volunteers_filter"
                        label="Filtrer les Bénévoles"
                        :with_label="false"
                        name="volunteers_filter"
                        :collection="VolunteerStatus::cases()"
                        identifier="value"
                    />
                </div>
            </div>

        </section>

        {{-- TABLEAU DES BÉNÉVOLES --}}
        <x-admin.pages.volunteers.index.table
            class="lg:col-start-1 lg:col-end-10"
            :volunteers="$this->volunteers"/>

    </div>
</main>


