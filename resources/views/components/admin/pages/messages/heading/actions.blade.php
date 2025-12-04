@php
    use App\Enums\MessageStatus;
@endphp


<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        class="md:order-1"
        name="message_search"
        id="message_search"
        label="Rechercher un message"
        placeholder="Rechercher un message"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select
        container_classes="md:order-3"
        :all_selector="true"
        all_selector_label="Tous"
        id="messages_filter"
        label="Filtrer les messages"
        :with_label="false"
        name="messages_filter"
        :collection="MessageStatus::cases()"
        identifier="value"
    />
</div>
