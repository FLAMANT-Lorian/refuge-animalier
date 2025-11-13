@php

    $slider = [
        ['title' => 'Une équipe passionnée', 'content' => 'Bénévoles et soigneurs s’engagent chaque jour pour offrir attention, soins et amour à chaque animal — du plus petit oiseau au plus grand chien.'],
        ['title' => 'Des animaux choyés et socialisés', 'content' => 'Chaque pensionnaire est accueilli, soigné, et accompagné pour retrouver confiance avant l’adoption.'],
        ['title' => 'Des adoptions responsables', 'content' => 'Nous privilégions la rencontre, le dialogue et le bien-être des animaux, pour que chaque adoption soit une belle histoire durable.'],
];

@endphp

<x-layouts.app title="Accueil · Les pattes heureuses">
    <main id="content">
        <x-public.text-media
            title="Où nous trouver"
            subtitle="Au cœur de la nature"
            content="Le refuge Les Pattes Heureuses est situé au 12, Rue des Lavandes, 4000 Liège, Belgique, dans un cadre calme et verdoyant, idéal pour le bien-être de nos pensionnaires. Que vous veniez pour adopter ou simplement nous rendre visite, notre équipe vous accueillera avec plaisir et vous présentera nos compagnons à quatre pattes."
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="left"
            btn_label="Découvrir nos animaux"
            btn_title="Vers la page des animaux"
            :btn_destination="route('public.homepage')"/>

        <x-public.slider title="Les points forts de notre refuge" :articles="$slider"/>

        <x-public.text-media
            title="Envie de nous rejoindre ?"
            subtitle="Devenez bénévole !"
            content="Aux Pattes Heureuses, chaque coup de main compte ! Rejoindre notre équipe de bénévoles, c’est offrir un peu de votre temps et beaucoup d’amour aux animaux qui en ont besoin. Que ce soit pour nourrir, promener, nettoyer, accompagner les adoptions ou simplement offrir des câlins, votre présence fait toute la différence !"
            :img_path="asset('assets/img/tmp.png')"
            img_alt="Image temporaire"
            text_location="right"
            btn_label="Devenir bénévole"
            btn_title="Vers la page de contat"
            :btn_destination="route('public.homepage')"/>
    </main>
</x-layouts.app>
