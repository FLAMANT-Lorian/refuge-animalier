<header class="px-6 pt-10">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{-----------------------------------}}
    {{-----Menu de navigation mobile-----}}
    {{-----------------------------------}}
    <nav class="flex px-6 py-4 items-center justify-between bg-white border border-gray-200 rounded-2xl">
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" alt="Logo des pattes heureuses">
        <input class="hidden bg-menu peer" type="checkbox" name="bg-menu" id="burger-menu">

        {{--BURGER MENU CLOSE ??? => block peer-checked:hidden --}}
        <label for="burger-menu" class="cursor-pointer">
            <svg class="" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="4" y="7" width="24" height="2" rx="1" fill="#292A2B"/>
                <rect x="7" y="15" width="18" height="2" rx="1" fill="#292A2B"/>
                <rect x="4" y="23" width="24" height="2" rx="1" fill="#292A2B"/>
            </svg>
        </label>


        {{--Burger Menu--}}
        <x-layouts.menu.bg-menu/>
    </nav>
</header>
