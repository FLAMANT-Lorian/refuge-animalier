@php
    $accordion = [
        ['title' => __('public/about.accordion_1_title'), 'content' => __('public/about.accordion_1_text'), 'img_name' => 'public_4.webp', 'img_alt' => __('public/about.accordion_1_alt')],
        ['title' => __('public/about.accordion_2_title'), 'content' => __('public/about.accordion_2_text'), 'img_name' => 'public_5.webp', 'img_alt' => __('public/about.accordion_2_alt')],
        ['title' => __('public/about.accordion_3_title'), 'content' => __('public/about.accordion_3_text'), 'img_name' => 'public_6.webp', 'img_alt' => __('public/about.accordion_3_alt')],
        ['title' => __('public/about.accordion_4_title'), 'content' => __('public/about.accordion_4_text'), 'img_name' => 'public_7.webp', 'img_alt' => __('public/about.accordion_4_alt')],
    ];
@endphp

<x-public.app title="{!! __('public/about.page_title') !!}">
    <main id="content" class="about">
        <x-public.sections.text-media
            :title="__('public/about.text_media_1_title')"
            :subtitle="__('public/about.text_media_1_subtitle')"
            :content="__('public/about.text_media_1_text')"
            img_name="public_3.webp"
            :img_alt="__('public/about.text_media_1_alt')"
            text_location="left"
            :btn_label="__('public/about.text_media_1_btn')"
            :btn_title="__('public/about.text_media_1_btn_title')"
            :btn_destination="route('public.contact')"
            animals="true"/>

        <x-public.sections.accordion
            :title="__('public/about.accordion_title')"
            :articles="$accordion"/>

        <x-public.sections.text-media
            :title="__('public/about.text_media_2_title')"
            :subtitle="__('public/about.text_media_2_subtitle')"
            :content="__('public/about.text_media_2_text')"
            img_name="public_1.webp"
            :img_alt="__('public/about.text_media_2_alt')"
            text_location="right"
            :btn_label="__('public/about.text_media_2_btn')"
            :btn_destination="route('public.animals.index')"
            :btn_title="__('public/about.text_media_2_btn_title')"/>
    </main>
</x-public.app>
