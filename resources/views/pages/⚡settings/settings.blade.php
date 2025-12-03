<main class="settings flex-1" id="content">
    <div class="px-6 py-12">

        {{-- EN-TÊTE --}}
        <section class="flex flex-col gap-4">
            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.settings') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}
            </a>

            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold">Paramètres</h2>
                <p>Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires</p>
            </div>
        </section>

        {{-- FORMULAIRE --}}
        <section>
            <h2 class="sr-only">Formulaire pour les paramètres de l'utilisateur</h2>
            <form action="" method="post" class="flex flex-col gap-10">

                {{-- AVATAR --}}
                <fieldset class="flex flex-col gap-4">
                    <legend class="contents text-lg font-semibold">Photo de profil</legend>
                    <div class="flex flex-row gap-6">
                        <img alt="avatar de Lorian"
                            class="rounded-full h-[7.5rem] w-[7.5rem] bg-gray-100"
                             src="{!! asset('assets/img/avatar.png') !!}">
                        <div class="flex flex-col gap-4">
                            <div class="inline-flex">
                                <input class="sr-only" type="file" name="avatar" id="avatar">
                                <label for="avatar"
                                       class="w-full text-center px-4 py-2.5 text-white bg-green-500 rounded-lg border border-green-500 hover:bg-transparent hover:text-black transition-all ease-in-out duration-200 hover:cursor-pointer">Choisir
                                    un
                                    avatar</label>
                            </div>
                            <x-buttons.base
                                destination="#"
                                title="Supprimer l’image"
                                class="bg-red text-white border-red">
                                Supprimer l’avatar
                            </x-buttons.base>
                        </div>
                    </div>
                </fieldset>

                {{-- INFORMATIONS DE L'UTILISATEUR --}}
                <fieldset class="flex flex-col gap-4">
                    <legend class="contents text-lg font-semibold">Vos informations</legend>
                    <div class="flex flex-col gap-6">

                        {{-- Nom de famille --}}
                        <x-forms.input-text
                            name="last_name"
                            id="last_name"
                            label="Nom"
                            type="text"
                            placeholder="Flamant"
                            :required="true"
                        />

                        {{-- Prénom --}}
                        <x-forms.input-text
                            name="first_name"
                            id="first_name"
                            label="Prénom"
                            type="text"
                            placeholder="Lorian"
                            :required="true"
                        />

                        {{-- EMAIL --}}
                        <x-forms.input-text
                            name="email"
                            id="email"
                            label="Adresse e-mail"
                            type="email"
                            placeholder="lorian.flamant@example.be"
                            :required="true"
                        />

                        {{-- CODE POSTAL --}}
                        <x-forms.input-number
                            name="postal_code"
                            id="postal_code"
                            label="Code postal"
                            type="text"
                            placeholder="4000"
                            :required="true"
                        />

                        {{-- ADRESSE --}}
                        <x-forms.input-text
                            name="location"
                            id="location"
                            label="Adresse"
                            type="text"
                            placeholder="Rue du champs, 12"
                            :required="true"
                        />
                    </div>
                </fieldset>

                {{-- NOTIFICATIONS --}}
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

                {{-- BOUTON DE SOUMISSION --}}
                <x-forms.normal-button-submit
                label="Sauvegarder les changements"/>
            </form>
        </section>

    </div>
</main>
