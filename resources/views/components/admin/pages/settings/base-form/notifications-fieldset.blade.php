<fieldset class="flex flex-col gap-4">
    <div class="flex flex-col gap-1">
        <legend class="contents text-lg font-semibold">Notifications</legend>
        <p class="text-base font-normal">
            Sélectionnez les notifications que vous souhaitez recevoir par e-mail
        </p>
    </div>
    <div class="flex flex-col gap-2">

        <x-forms.input-checkbox
            name="notifications[adoption_requests]"
            id="adoptions_requests"
            label="Demandes d’adoptions"/>

        <x-forms.input-checkbox
            name="notifications[animal_sheets]"
            id="animal_sheets"
            label="Modification / création d’une fiche d’un animal"/>

        <x-forms.input-checkbox
            name="notifications[messages]"
            id="messages"
            label="Messages via le formulaire de contact"/>

        <x-forms.input-checkbox
            name="notifications[activity_report]"
            id="activity_report"
            label="Rapport d’activité mensuel disponible"/>

    </div>
</fieldset>
