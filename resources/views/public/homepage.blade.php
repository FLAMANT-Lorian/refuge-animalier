@php

    $slider = [
        ['title' => __('public/homepage.slide_1_title'), 'content' => __('public/homepage.slide_1_text')],
        ['title' => __('public/homepage.slide_2_title'), 'content' => __('public/homepage.slide_2_text')],
        ['title' => __('public/homepage.slide_3_title'), 'content' => __('public/homepage.slide_3_text')],
];

@endphp

<x-public.app title="Accueil · Les pattes heureuses">
    <main id="content" class="homepage">
        <x-public.sections.text-media
            :title="__('public/homepage.text_media_1_title')"
            :subtitle="__('public/homepage.text_media_1_subtitle')"
            :content="__('public/homepage.text_media_1_text')"
            img_name="public_2.webp"
            :img_alt="__('public/homepage.text_media_1_alt')"
            text_location="left"
            :btn_label="__('public/homepage.text_media_1_btn')"
            :btn_destination="route('public.animals.index')"
            :btn_title="__('public/homepage.text_media_1_btn_title')"
            animals="true"/>

        <x-public.sections.slider :title="__('public/homepage.slider_title')" :articles="$slider"/>

        <x-public.sections.text-media
            :title="__('public/homepage.text_media_2_title')"
            :subtitle="__('public/homepage.text_media_2_subtitle')"
            :content="__('public/homepage.text_media_2_text')"
            img_name="public_1.webp"
            :img_alt="__('public/homepage.text_media_2_alt')"
            text_location="right"
            :btn_label="__('public/homepage.text_media_2_btn')"
            :btn_destination="route('public.contact')"
            :btn_title="__('public/homepage.text_media_2_btn_title')"/>
    </main>
</x-public.app>
