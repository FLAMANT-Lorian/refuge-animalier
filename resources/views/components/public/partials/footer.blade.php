<footer
    class="relative bg-green-500 py-[5rem] md:py-[6rem] lg:py-[8rem] px-6 md:px-12 lg:px-[12rem] flex flex-col gap-10 md:grid md:grid-cols-10 lg:grid-cols-[repeat(13,minmax(0,1fr))] md:gap-x-6 md:gap-y-10">
    <div
        class="dogs grid grid-cols-1 gap-6 md:grid-cols-subgrid md:col-start-1 md:col-end-11 lg:col-start-5 lg:col-end-14 md:gap-y-14">
        <h2 class="sr-only">Footer</h2>

        {{-- Nav secondaire --}}
        <x-public.navigation.footer.footer-navigation-link/>

        {{-- Coordonnées --}}
        <x-public.navigation.footer.footer-coordinate/>

        {{-- Heure d’ouverture --}}
        <x-public.navigation.footer.footer-opening-hours/>
    </div>
    <div
        class="flex-col md:flex-row lg:flex-col md:items-center lg:items-start gap-2 border-t lg:border-none border-t-white pt-6 lg:p-0 md:col-start-1 md:col-end-11 lg:col-end-4 lg:row-start-1 lg:row-end-2">
        <a class="block hover:translate-x-1 transition-all" href="{!! route('public.homepage') !!}"
           title="Vers la page d’accueil">
            <img src="{!! asset('assets/img/svg/logo/logo_small_white.svg') !!}" class="self-start"
                 alt="Logo des pattes heureuses">
        </a>
        <p class="text-sm font-normal text-white">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</footer>
