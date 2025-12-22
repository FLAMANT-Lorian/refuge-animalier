<section>
    <h2 class="sr-only">{!! __('admin/volunteers.create_form') !!}</h2>

    <form action="" method="post" class="flex flex-col gap-10">
        {{-- AVATAR --}}
        <x-admin.pages.volunteers.create.avatar-fieldset/>

        {{-- INFO DE BASE --}}
        <x-admin.pages.volunteers.create.fieldset-base/>

        {{-- DISPONIBILITÉ --}}
        <x-admin.pages.volunteers.create.fieldset-availability/>

        {{-- MOT DE PASSE --}}
        <x-admin.pages.volunteers.create.fieldset-password/>

        {{-- BOUTON DE SOUMISSION --}}
        <x-forms.buttons.normal-button-submit
            :loading_label="__('admin/animals.create_loading_label')"
            class="self-end"
            :label="__('admin/volunteers.create_volunteer')"/>
    </form>

</section>
