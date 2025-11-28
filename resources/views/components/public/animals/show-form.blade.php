<div class="flex flex-col gap-4">
    <div class="flex flex-col gap-1">
            <h4 class="flex items-center gap-4 text-xl font-semibold">
            <x-icons.calendar class="p-1.5 border border-blue-500 bg-blue-100 rounded-lg"/>
                Demande de rendez-vous
            </h4>
        <span>
            Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires
        </span>
    </div>
    <form action="" method="post" class="flex flex-col gap-4">
        <fieldset class="flex flex-col gap-6 min-[600px]:grid min-[600px]:grid-cols-2">
            <legend class="sr-only">Informations pour une demande de rendez-vous</legend>

            {{-- NOM --}}
            <x-forms.input-text
                class="min-[600px]:col-start-1 min-[600px]:col-end-2"
                type="text"
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
                class="min-[600px]:col-start-2 min-[600px]:col-end-3"
                name="firstname"
                id="firstname"
                label="Prénom"
                placeholder="John"
                :required="true"
            />

            {{-- ADRESSE E-MAIL --}}
            <x-forms.input-text
                type="email"
                class="min-[600px]:col-start-1 min-[600px]:col-end-3"
                name="email"
                id="email"
                label="Adresse e-mail"
                placeholder="johndoe@example.be"
                :required="true"
            />

            {{-- COMMUNICATION --}}
            <x-forms.textarea
                class="min-[600px]:col-start-1 min-[600px]:col-end-3"
                name="message"
                id="message"
                label="Communication"
                placeholder="Je vous contacte pour ..."
                :required="true"
            />

        </fieldset>
        <x-forms.button-submit label="Demander un rendez-vous"/>
    </form>
</div>
