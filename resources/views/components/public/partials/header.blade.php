<header class="px-6 pt-10 md:px-12 lg:px-[12rem]">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only sr-only focus:not-sr-only focus:fixed focus:left-1/2 focus:px-3 focus:py-2 focus:outline focus:outline-gray-200 focus:bg-gray-100 rounded-full -translate-x-1/2 top-0 focus:top-4 trans-all" href="#content" title="Aller directement au contenu principal">{!! __('public/header.main_content') !!}</a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav aria-label="Navigation principale" class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">{!! __('public/header.main_nav') !!}</h2>
        <a class="relative z-50 block md:hidden max-w-[13.75rem] w-full hover:translate-x-1 transition-all"
            href="{!! route('public.homepage') !!}" title="{!! __('public/header.homepage_link_title') !!}">
            <img class="w-full h-auto" src="{!! Storage::disk('s3')->url('base/svg/logo/logo_small.svg')  !!}" alt="{!! __('public/header.logo_alt') !!}">
        </a>
        <a class="relative z-50 hidden md:block max-w-[17.5rem] w-full hover:translate-x-1 transition-all"
            href="{!! route('public.homepage') !!}" title="{!! __('public/header.homepage_link_title') !!}">
            <img class="w-full h-auto" src="{!! Storage::disk('s3')->url('base/svg/logo/logo_normal.svg')  !!}" alt="{!! __('public/header.logo_alt') !!}">
        </a>

        <x-public.navigation.header.burger-menu-cross/>

        <x-public.navigation.header.navigation-bar/>
    </nav>
</header>
