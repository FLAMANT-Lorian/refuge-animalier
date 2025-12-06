<x-admin.partials.modal>

    <x-slot:title>
        Ajouter une nouvelle note de visite
    </x-slot:title>

    <x-slot:sub_title>
        Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires
    </x-slot:sub_title>

    <x-slot:body>
        <form method="post" class="flex flex-col gap-6">
            <fieldset class="flex flex-col gap-6 md:grid md:grid-cols-2">
                <legend class="sr-only">Créer un note de visite</legend>

                <x-forms.fields.input-text
                    class="md:col-start-1 md:col-end-2 md:row-start-1"
                    field_name="name"
                    name="name"
                    label="Nom complet"
                    placeholder="Dupont Jean"
                    :required="true"/>

                <x-forms.fields.input-text
                    class="md:col-start-1 md:col-end-2 md:row-start-2"
                    field_name="email"
                    name="email"
                    type="email"
                    label="Adresse e-mail"
                    placeholder="jean.dupont@test.com"
                    :required="true"/>

                <x-forms.fields.input-text
                    class="md:col-start-1 md:col-end-2 md:row-start-3"
                    field_name="date"
                    name="date"
                    type="date"
                    label="Date de la visite"
                    placeholder="22/07/2025"
                    :required="true"/>

                <x-forms.fields.textarea
                    class="md:col-start-2 md:col-end-3 md:row-start-1 md:row-end-4"
                    field_name="note"
                    name="note"
                    label="Note"
                    placeholder="Il est ..."
                    :required="true"/>

            </fieldset>

            <x-forms.buttons.outlined-button-submit
                label="Créer la note de visite"/>
        </form>
    </x-slot:body>

</x-admin.partials.modal>
