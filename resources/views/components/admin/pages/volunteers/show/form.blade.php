<section class="flex flex-col gap-6">
    <h2 class="sr-only">{!! __('admin/volunteers.show_form') !!}</h2>

    {{-- AVATAR FORM --}}
    <x-admin.pages.volunteers.show.avatar-fieldset/>

    <form wire:submit="save" class="flex flex-col gap-10">

        {{-- INFO DE BASE --}}
        <x-admin.pages.volunteers.show.fieldset-base/>

        {{-- DISPONIBILITÉ --}}
        <x-admin.pages.volunteers.show.fieldset-availability/>

        {{-- BOUTON DE SOUMISSION --}}
        <x-forms.buttons.normal-button-submit
            :loading_label="__('admin/animals.create_loading_label')"
            class="self-end"
            :label="__('admin/volunteers.save_modification')"/>
    </form>

</section>
