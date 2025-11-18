@php

    $slider = [
        ['title' => 'Une équipe passionnée', 'content' => 'Bénévoles et soigneurs s’engagent chaque jour pour offrir attention, soins et amour à chaque animal — du plus petit oiseau au plus grand chien.'],
        ['title' => 'Des animaux choyés et socialisés', 'content' => 'Chaque pensionnaire est accueilli, soigné, et accompagné pour retrouver confiance avant l’adoption.'],
        ['title' => 'Des adoptions responsables', 'content' => 'Nous privilégions la rencontre, le dialogue et le bien-être des animaux, pour que chaque adoption soit une belle histoire durable.'],
];

@endphp

<x-public.app title="Accueil · Les pattes heureuses">
    <main id="content" class="homepage">
        <x-public.sections.text-media
            title="Bienvenue au refuge&nbsp;,"
            subtitle="Les pattes heureuses&nbsp;!"
            content="Chiens, chats, oiseaux, lapins et bien d’autres compagnons attendent ici une nouvelle famille.Venez leur rendre visite, découvrez leurs histoires et laissez-vous toucher par leurs regards remplis d’espoir. Peut-être trouverez-vous celui ou celle qui fera battre votre cœur"
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="left"
            btn_label="Découvrir nos animaux"
            btn_title="Vers la page des animaux"/>

        <x-public.sections.slider title="Les points forts de notre refuge" :articles="$slider"/>

        <x-public.sections.text-media
            title="Envie de nous rejoindre&nbsp;?"
            subtitle="Devenez bénévole&nbsp;!"
            content="Aux Pattes Heureuses, chaque coup de main compte ! Rejoindre notre équipe de bénévoles, c’est offrir un peu de votre temps et beaucoup d’amour aux animaux qui en ont besoin. Que ce soit pour nourrir, promener, nettoyer, accompagner les adoptions ou simplement offrir des câlins, votre présence fait toute la différence !"
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="right"
            btn_label="Devenir bénévole"
            btn_title="Vers la page de contact"/>
    </main>
</x-public.app>
