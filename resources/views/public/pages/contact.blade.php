@php

    $coordinates = [
           ['label' => 'Rue des Lavandes 12, 4000 Liège, Belgique', 'title' => 'L’adresse de notre refuge', 'destination' => '#'],
           ['label' => 'contact@lespattesheureuses.be', 'title' => 'L’adresse e-mail du refuge', 'destination' => '#'],
           ['label' => '+32 81 23 45 67', 'title' => 'Le numéro de téléphone du refuge', 'destination' => '#'],
       ];

@endphp

<x-public.app title="Contact · Les pattes heureuses">
    <main id="content" class="contact">
        <section class="px-6 py-[4.5rem] md:px-12 md:py-[6rem] lg:px-[12rem] lg:py-[11rem] flex lg:grid flex-col lg:grid-cols-[repeat(13,minmax(0,1fr))] gap-6 relative">
            <article class="h-fit flex lg:flex flex-col gap-6 lg:gap-8 md:grid md:grid-cols-10 lg:col-start-1 lg:col-end-5 lg:sticky lg:top-12">
                <div class="md:col-start-1 md:col-end-6">
                    <h2 class="text-2xl font-bold pb-2">Contactez-nous&nbsp;!</h2>
                    <p class="text-base font-normal">
                        Vous avez une question, souhaitez adopter, faire un don, devenir bénévole ou simplement en
                        savoir
                        plus sur notre refuge ? N’hésitez pas à nous contacter&nbsp;!
                    </p>
                </div>
                <aside class="md:col-start-7 md:col-end-11">
                    <h3 class="text-xl font-semibold pb-2">Coordonnées</h3>
                    <ul class="flex flex-col gap-2">
                        @foreach($coordinates as $coordinate)
                            <li>
                                <a class="hover:cursor-pointer hover:font-bold transition-all text-base font-normal"
                                   href="{!! $coordinate['destination'] !!}"
                                   title="{!! $coordinate['title'] !!}">
                                    {!! $coordinate['label'] !!}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>
            </article>
            <section class="lg:col-start-6 lg:col-end-14">
                <h2 class="sr-only">Formulaire de contact</h2>
                <form class="p-6 flex flex-col gap-8 bg-white border border-gray-200 rounded-2xl" action=""
                      method="post">
                    <fieldset class="flex flex-col gap-6 md:grid md:grid-cols-10">
                        <legend class="sr-only">Informations de contact</legend>

                        {{-- NOM --}}
                        <x-forms.input-text
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
                            class="md:col-start-6 md:col-end-11"
                            name="firstname"
                            id="firstname"
                            label="Prénom"
                            placeholder="John"
                            :required="true"
                        />

                        {{-- ADRESSE E-MAIL --}}
                        <x-forms.input-text
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
                    <x-forms.button label="Envoyer"/>
                </form>
            </section>
        </section>
    </main>
</x-public.app>
