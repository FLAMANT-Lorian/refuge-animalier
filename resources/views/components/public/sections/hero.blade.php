<section class="relative animals_hero_section h-[30.75rem] md:h-[30.125rem] lg:h-[48.875rem]">
    <div
        class="flex flex-col md:grid md:gap-x-6 md:gap-y-2 md:grid-cols-10 lg:grid-cols-[repeat(12,minmax(0,1fr))] px-6 py-[4.5rem] md:px-12 md:py-[6rem] lg:px-[12rem] lg:py-[11rem]">
        <h2 class="text-3xl lg:text-[5rem]/[5.375rem] font-bold text-white text-center md:col-start-3 md:col-end-9 lg:col-start-4 lg:col-end-10">
            {!! __('public/animals.index_hero_title') !!}
        </h2>
        <p class="text-white text-center md:col-start-3 md:col-end-9 lg:col-start-4 lg:col-end-10">
            {!! __('public/animals.index_hero_text') !!}
        </p>
    </div>
    <a class="transition-all absolute bottom-10 left-1/2 -translate-x-1/2 hover:translate-y-2" href="#animals">
        <svg width="20" height="34" viewBox="0 0 20 34" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M8.64202 1.35373C8.64202 0.606088 9.25 0 10 0C10.75 0 11.358 0.606088 11.358 1.35373V29.3785L17.682 23.0743C18.2123 22.5456 19.0719 22.5456 19.6023 23.0743C20.1326 23.6029 20.1326 24.4599 19.6023 24.9885L10.9601 33.6035C10.4298 34.1322 9.57019 34.1322 9.03986 33.6035L0.397744 24.9885C-0.132581 24.4599 -0.132581 23.6029 0.397744 23.0743C0.92807 22.5456 1.78769 22.5456 2.31802 23.0743L8.64202 29.3785V1.35373Z"
                fill="#FBFCFA"/>
        </svg>
    </a>
    <figure
        class="absolute block -top-[6.75rem] md:-top-[7.375rem] -z-[2] h-[37.5rem] lg:h-[56.25rem] w-full max-w-[110rem] before:absolute before:w-full before:max-w-[110rem]  before:h-full before:content-[''] before:bg-[rgba(17,17,17,0.45)] before:top-0 before:bottom-0 before:right-0 before:left-0">
        <img class="hero w-full h-full object-cover max-h-full"
             alt="{!! __('public/animals.index_hero_bg_alt') !!}"
             src="{!! Storage::disk('s3')->url('base/bg-image-hero.jpg')  !!}">
    </figure>
</section>
