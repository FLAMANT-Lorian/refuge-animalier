<form action="" method="post" class="flex flex-col gap-6">
    <fieldset class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">
        <legend class="sr-only">Changer mon mot de passe</legend>

        {{-- ANCIEN MOT DE PASSE --}}
        <x-forms.input-password
            name="old_password"
            id="old_password"
            label="Ancien mot de passe"
            required="true"
        />

        {{-- NOUVEAU MOT DE PASSE --}}
        <x-forms.input-password
            name="new_password"
            id="new_password"
            label="Nouveau mot de passe"
            required="true"
        />

    </fieldset>
    {{-- BOUTON DE SOUMISSION --}}
    <x-forms.normal-button-submit
        class="self-start"
        label="Changer mon mot de passe"/>
</form>
