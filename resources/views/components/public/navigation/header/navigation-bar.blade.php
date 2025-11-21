<div class="nav__container">
    <x-public.navigation.header.navigation-links/>

    <div class="flex flex-col gap-1 border-t border-t-gray-100 pt-4 mt-auto md:hidden">
        <a href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img src="{!! asset('assets/img/logo_small.svg') !!}" class="self-start fill-white"
                 alt="Logo des pattes heureuses">
        </a>
        <p class="text-sm font-normal text-black">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</div>
