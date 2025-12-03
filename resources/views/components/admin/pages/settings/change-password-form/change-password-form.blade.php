<form action="" method="post" class="flex flex-col gap-6">
    <fieldset class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">
        <legend class="sr-only">Changer mon mot de passe</legend>

        {{-- ANCIEN MOT DE PASSE --}}
        <x-forms.fields.input-password
            field_name="old_password"
            name="old_password"
            label="Ancien mot de passe"
            :required="true"
        />

        {{-- NOUVEAU MOT DE PASSE --}}
        <x-forms.fields.input-password
            field_name="new_password"
            name="new_password"
            label="Nouveau mot de passe"
            required="true"
        />

    </fieldset>
    {{-- BOUTON DE SOUMISSION --}}
    <x-forms.buttons.normal-button-submit
        class="self-start"
        label="Changer mon mot de passe"/>
</form>
