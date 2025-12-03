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
    <form action="" method="post" class="flex flex-col gap-6">
        <fieldset class="flex flex-col gap-6 min-[600px]:grid min-[600px]:grid-cols-2">
            <legend class="sr-only">Informations pour une demande de rendez-vous</legend>

            {{-- NOM COMPLET --}}
            <x-forms.fields.input-text
                field_name="full_name"
                name="full_name"
                label="Nom complet"
                placeholder="Doe"
                :required="true"
            />

            {{-- ADRESSE E-MAIL --}}
            <x-forms.fields.input-text
                type="email"
                field_name="email"
                name="email"
                label="Adresse e-mail"
                placeholder="johndoe@example.be"
                :required="true"
            />

            {{-- COMMUNICATION --}}
            <x-forms.fields.textarea
                class="min-[600px]:col-start-1 min-[600px]:col-end-3"
                field_name="message"
                name="message"
                label="Communication"
                placeholder="Je vous contacte pour ..."
                :required="true"
            />

        </fieldset>
        <x-forms.buttons.outlined-button-submit label="Demander un rendez-vous"/>
    </form>
</div>
