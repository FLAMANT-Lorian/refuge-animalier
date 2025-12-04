<section>
    <h2 class="sr-only">Formulaire de création d’un nouveau bénévole</h2>

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
            class="self-end"
            label="Créer le profil du bénévole"/>
    </form>

</section>
