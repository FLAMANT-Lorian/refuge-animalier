<form action="" method="post" class="flex flex-col gap-5 w-full">

    {{-- INPUT EMAIL --}}
    <x-forms.input-text
        id="email"
        name="email"
        type="email"
        label="Adresse e-mail"
        placeholder="johndoe@example.be"
        :required="true"/>

    {{-- INPUT PASSWORD --}}
    <div class="flex flex-col gap-2">
        <x-forms.input-password
            id="password"
            name="password"
            label="Mot de passe"
            :required="true"/>
        <a href="#" class="text-blue-600 hover:underline self-end">
            Mot de passe oublié ?
        </a>
    </div>

    {{-- INPUT SUBMIT --}}
    <x-forms.outlined-button-submit label="Me connecter"/>
</form>
