<header class="px-6 pt-10 md:px-12 lg:px-[12rem]">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">Navigation principale</h2>
        <a class="flex md:hidden w-full"
            href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img src="{!! asset('assets/img/logo_small.svg') !!}" alt="Logo des pattes heureuses">
        </a>
        <a class="hidden md:flex w-full"
            href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img src="{!! asset('assets/img/logo_normal.svg') !!}" alt="Logo des pattes heureuses">
        </a>

        <x-public.navigation.burger-menu-cross/>

        <x-public.navigation.navigation-bar/>
    </nav>
</header>
