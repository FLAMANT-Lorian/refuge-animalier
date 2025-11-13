<header class="px-6 pt-10">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">Navigation principale</h2>
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" alt="Logo des pattes heureuses">

        <div class="block lg:hidden">
            <x-public.navigation.burger-menu-cross/>
            <x-public.navigation.navigation-bar device="mobile"/>
        </div>

        <div class="hidden lg:block">
            <x-public.navigation.navigation-bar device="desktop"/>
        </div>
    </nav>
</header>
