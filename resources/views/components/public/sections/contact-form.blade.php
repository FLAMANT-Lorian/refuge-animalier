<form class="p-6 flex flex-col gap-8 bg-white border border-gray-200 rounded-2xl"
      action=""
      method="post">
    <fieldset class="flex flex-col gap-6 md:grid md:grid-cols-10">
        <legend class="sr-only">Informations de contact</legend>

        {{-- NOM --}}
        <x-forms.input-text
            type="text"
            class="md:col-start-1 md:col-end-6"
            name="lastname"
            title="lastname"
            id="lastname"
            label="Nom"
            placeholder="Doe"
            :required="true"
        />

        {{-- PRÉNOM --}}
        <x-forms.input-text
            type="text"
            class="md:col-start-6 md:col-end-11"
            name="firstname"
            id="firstname"
            label="Prénom"
            placeholder="John"
            :required="true"
        />

        {{-- ADRESSE E-MAIL --}}
        <x-forms.input-text
            type="email"
            class="md:col-start-1 md:col-end-11"
            name="email"
            id="email"
            label="Adresse e-mail"
            placeholder="johndoe@example.be"
            :required="true"
        />

        {{-- COMMUNICATION --}}
        <x-forms.textarea
            class="md:col-start-1 md:col-end-11"
            name="message"
            id="message"
            label="Communication"
            placeholder="Je vous contacte pour ..."
            :required="true"
        />

    </fieldset>
    <x-forms.outlined-button-submit label="Envoyer"/>
</form>
