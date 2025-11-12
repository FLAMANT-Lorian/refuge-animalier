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

        {{--COMPOSANTS SLIDER--}}
        {{--COMPOSANTS TEXT-MEDIA--}}
    </main>
</x-layouts.app>
