<form action="" method="post" class="flex flex-col gap-10">

    {{-- AVATAR --}}
    <x-admin.pages.settings.base-form.avatar-fieldset/>

    {{-- INFORMATIONS DE L'UTILISATEUR --}}
    <x-admin.pages.settings.base-form.username-info-fieldset/>

    {{-- NOTIFICATIONS --}}
    <x-admin.pages.settings.base-form.notifications-fieldset/>

    {{-- BOUTON DE SOUMISSION --}}
    <x-forms.buttons.normal-button-submit
        class="self-start"
        label="Sauvegarder les changements"/>
</form>
