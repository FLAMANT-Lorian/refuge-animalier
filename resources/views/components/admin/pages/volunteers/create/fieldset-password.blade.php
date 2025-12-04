<fieldset class="flex flex-col gap-4 pt-6 border-t border-t-gray-200">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-semibold">Mot de passe</legend>
        <p>Le mot de passe doit contenir minimum 10 caractères</p>
    </div>
    <div class="flex flex-col md:grid md:grid-cols-2 min-[68.75rem]:grid-cols-3 gap-6">

        {{-- MOT DE PASSE --}}
        <x-forms.fields.input-password
        name="password"
        field_name="password"
        label="Mot de passe"
        :required="true"
        />

    </div>
</fieldset>
