<?php

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{

    #[Computed]
    function profile(): array
    {
        return [
            'last_name' => 'Flamant',
            'first_name' => 'Lorian',
            'role' => 'Administrateur'
        ];
    }
};
?>

<header class="h-screen px-6 pt-10 lg:pt-0 md:px-12 lg:px-0 lg:w-[18.75rem]">
    <h1 class="sr-only">Les pattes heureuses</h1>
    <a class="sr-only" href="#content" title="Aller directement au contenu principal">Aller directement au
        contenu principal</a>

    {{----------------------------}}
    {{-----Menu de navigation-----}}
    {{----------------------------}}
    <nav aria-label="Navigation principale"
         class="flex lg:flex-col lg:h-screen px-6 py-4 lg:py-10 items-center justify-between lg:justify-start bg-white border border-gray-200 rounded-2xl">
        <h2 class="sr-only">Navigation principale</h2>
        <a class="relative z-50 block max-w-[13.75rem] w-full hover:translate-x-1 transition-all"
           href="{!! route('public.homepage') !!}" title="Vers la page d’accueil">
            <img class="w-full h-auto" src="{!! asset('assets/img/svg/logo/logo_small.svg') !!}"
                 alt="Logo des pattes heureuses">
        </a>

        <x-admin.navigation.burger-menu-cross-admin/>


        <x-admin.navigation.navigation-bar :profile_data="$this->profile"/>
    </nav>
</header>
