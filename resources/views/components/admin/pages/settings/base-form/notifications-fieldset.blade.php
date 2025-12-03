<fieldset class="flex flex-col gap-4">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-semibold">Notifications</legend>
        <p class="text-base font-normal text-gray-500">
            Sélectionnez les notifications que vous souhaitez recevoir par e-mail
        </p>
    </div>
    <div class="flex flex-col gap-2">

        <x-forms.fields.input-checkbox
            field_name="adoptions_requests"
            name="notifications[adoption_requests]"
            label="Demandes d’adoptions"/>

        <x-forms.fields.input-checkbox
            field_name="animal_sheets"
            name="notifications[animal_sheets]"
            label="Modification / création d’une fiche d’un animal"/>

        <x-forms.fields.input-checkbox
            field_name="messages"
            name="notifications[messages]"
            label="Messages via le formulaire de contact"/>

        <x-forms.fields.input-checkbox
            field_name="activity_report"
            name="notifications[activity_report]"
            label="Rapport d’activité mensuel disponible"/>

    </div>
</fieldset>
