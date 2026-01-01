@php
    use App\Enums\MessageStatus;
@endphp


<div class="flex flex-col md:flex-row gap-4 lg:col-start-5 lg:col-end-10 lg:justify-end lg:items-center lg:gap-6">

    {{-- CHAMPS DE RECHERCHE --}}
    <x-forms.fields.input-search
        wire="term"
        class="md:order-1"
        name="message_search"
        id="message_search"
        :label="__('admin/messages.search')"
        :placeholder="__('admin/messages.search')"
    />

    {{-- SELECTION DES FILTRES --}}
    <x-forms.fields.select-filter
        wire="selected_filter"
        container_classes="md:order-3"
        :all_selector="true"
        :all_selector_label="__('admin/messages.all')"
        id="messages_filter"
        :label="__('admin/messages.filter')"
        :with_label="false"
        name="messages_filter"
        :collection="MessageStatus::cases()"
        identifier="value"
    />
</div>
