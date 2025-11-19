<header class="px-6 pt-10 md:px-12 lg:px-[12rem]">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav aria-label="Navigation principale" class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">Navigation principale</h2>
        <a class="block md:hidden max-w-[13.75rem] w-full hover:translate-x-1 transition-all"
            href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img class="w-full h-auto" src="{!! asset('assets/img/logo_small.svg') !!}" alt="Logo des pattes heureuses">
        </a>
        <a class="hidden md:block max-w-[17.5rem] w-full hover:translate-x-1 transition-all"
            href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img class="w-full h-auto" src="{!! asset('assets/img/logo_normal.svg') !!}" alt="Logo des pattes heureuses">
        </a>

        <x-public.navigation.burger-menu-cross/>

        <x-public.navigation.navigation-bar/>
    </nav>
</header>
