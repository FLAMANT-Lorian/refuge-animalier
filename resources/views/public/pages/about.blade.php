@php
    $accordion = [
        ['title' => 'Protéger et soigner', 'content' => 'Nous accueillons chaque animal dans un environnement sûr et chaleureux, en veillant à sa santé physique et émotionnelle. Des soins vétérinaires réguliers, une alimentation adaptée et un suivi personnalisé sont assurés pour garantir leur bien-être jusqu’à ce qu’ils trouvent un foyer permanent.', 'img_path' => asset('assets/img/tmp.png'), 'img_alt' => 'Image temporaire'],
        ['title' => 'Promouvoir l’adoption', 'content' => 'Nous mettons tout en œuvre pour encourager l’adoption responsable, en créant des liens durables entre les animaux et leurs futurs foyers. Chaque adoption est accompagnée de conseils personnalisés afin d’assurer une transition douce et harmonieuse pour l’animal comme pour la famille.', 'img_path' => asset('assets/img/tmp.png'), 'img_alt' => 'Image temporaire'],
        ['title' => 'Sensibiliser', 'content' => 'Nous sensibilisons le public à la cause animale en partageant des informations, des témoignages et des actions concrètes. Notre objectif est de faire comprendre que chaque geste compte pour améliorer la vie des animaux et encourager une cohabitation respectueuse entre humains et animaux.', 'img_path' => asset('assets/img/tmp.png'), 'img_alt' => 'Image temporaire'],
        ['title' => 'Soutenir la communauté', 'content' => 'Nous accompagnons la communauté à travers des actions solidaires, des conseils et des ressources dédiées. En soutenant les familles, les bénévoles et les partenaires, nous renforçons le lien entre humains et animaux et construisons ensemble un réseau bienveillant et engagé', 'img_path' => asset('assets/img/logo_normal.svg'), 'img_alt' => 'Image temporaire'],
    ];
@endphp

<x-public.app title="À propos · Les pattes heureuses">
    <main id="content" class="about">
        <x-public.sections.text-media
            title="Où nous trouver"
            subtitle="Au cœur de la nature"
            content="Le refuge Les Pattes Heureuses est situé au 12, Rue des Lavandes, 4000 Liège, Belgique, dans un cadre calme et verdoyant, idéal pour le bien-être de nos pensionnaires. Que vous veniez pour adopter ou simplement nous rendre visite, notre équipe vous accueillera avec plaisir et vous présentera nos compagnons à quatre pattes."
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="left"
            btn_label="Nous contacter"
            btn_title="Vers la page de contact"
            animals="true"/>

        <x-public.sections.accordion
            title="Nos missions"
            :articles="$accordion"/>

        <x-public.sections.text-media
            title="Ils ont besoins de vous !"
            subtitle="Un foyer pour nos compagnons"
            content="Chaque animal accueilli au refuge Les Pattes Heureuses mérite amour, attention et sécurité. Votre soutien peut faire toute la différence : adopter, devenir bénévole, ou faire un don permet de leur offrir une vie meilleure. Ensemble, donnons-leur une chance de connaître le bonheur qu’ils méritent"
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="right"
            btn_label="Découvrir nos animaux"
            btn_title="Vers la page des animaux"/>
    </main>
</x-public.app>
