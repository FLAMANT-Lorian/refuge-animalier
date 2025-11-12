@php
    $first_section = [
        'title' => 'Où nous trouver',
        'subtitle' => 'Au cœur de la nature',
        'content' => 'Le refuge Les Pattes Heureuses est situé au 12, Rue des Lavandes, 4000 Liège, Belgique, dans un cadre calme et verdoyant, idéal pour le bien-être de nos pensionnaires. Que vous veniez pour adopter ou simplement nous rendre visite, notre équipe vous accueillera avec plaisir et vous présentera nos compagnons à quatre pattes.',
        'img_path' => asset('assets/img/tmp.png'),
        'img_alt' => 'Image temporaire',
        'text_location' => 'left'
];
@endphp

<x-layouts.app title="Accueil · Les pattes heureuses">
    <main id="content">
        <x-public.text-media
            :title="$first_section['title']"
            :subtitle="$first_section['subtitle']"
            :content="$first_section['content']"
            :img_path="$first_section['img_path']"
            :img_alt="$first_section['img_alt']"
            :text_location="$first_section['text_location']">
        </x-public.text-media>
        {{--COMPOSANTS SLIDER--}}
        {{--COMPOSANTS TEXT-MEDIA--}}
    </main>
</x-layouts.app>
