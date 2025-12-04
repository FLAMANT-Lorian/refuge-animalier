<section>
    <h2 class="sr-only">Formulaire d’édition du bénévole</h2>

    <form action="" method="post" class="flex flex-col gap-10">
        {{-- AVATAR --}}
        <x-admin.pages.volunteers.show.avatar-fieldset/>

        {{-- INFO DE BASE --}}
        <x-admin.pages.volunteers.show.fieldset-base/>

        {{-- DISPONIBILITÉ --}}
        <x-admin.pages.volunteers.show.fieldset-availability/>

        {{-- BOUTON DE SOUMISSION --}}
        <x-forms.buttons.normal-button-submit
            class="self-end"
            label="Enregistrer les modifications"/>
    </form>

</section>
