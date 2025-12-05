<section>
    <h2 class="sr-only">
        Formulaire de création d’une nouvelle fiche d’animal
    </h2>

    <form action="" method="post" class="flex flex-col gap-6">

        {{-- FIELDSET ANIMAL --}}
        <x-admin.pages.animals.create.animal-fieldset/>

        {{-- FIELDSET ADOPTANT --}}
        <x-admin.pages.animals.create.adopter-fieldset/>

        <x-forms.buttons.normal-button-submit
            class="self-end"
            label="Créer la fiche de l’animal"/>
    </form>
</section>
