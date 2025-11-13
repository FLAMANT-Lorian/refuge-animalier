<header class="px-6 pt-10">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{-----------------------------------}}
    {{-----Menu de navigation mobile-----}}
    {{-----------------------------------}}
    <nav class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">Navigation principale</h2>
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" alt="Logo des pattes heureuses">

        {{--Pouvoir lui passer les classes pour mobile ou desktop => caché pour ordi--}}
        <x-public.navigation.burger-menu-cross/>

        {{--Pouvoir lui passer les classes pour mobile ou desktop--}}
        <x-public.navigation.burger-menu />
    </nav>
</header>
