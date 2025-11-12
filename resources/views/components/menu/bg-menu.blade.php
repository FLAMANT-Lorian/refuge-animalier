@php

    $items = [
        ['label'=> 'Nos animaux', 'title' => 'Aller vers la page des animaux', 'destination' => '#'],
        ['label'=> 'À propos', 'title' => 'Aller vers la page à propos', 'destination' => '#'],
        ['label'=> 'Contact', 'title' => 'Aller vers la page de contact', 'destination' => '#'],
    ];
@endphp

<div class="px-6 pt-[72px] pb-10 fixed bg-gray-50 -left-[100%] top-[106px] w-full h-[calc(100vh-106px)] peer-checked:left-0 transition-all flex flex-col">
    <ul class="flex flex-col gap-6">
        @foreach($items as $item)
            <li>
                <a class="text-2xl font-normal hover:font-bold transition-all"
                    href="{!! $item['destination'] !!}" title="{!! $item['title'] !!}">
                    {!! $item['label'] !!}
                </a>
            </li>
        @endforeach
    </ul>
    <div class="flex flex-col gap-1 border-t border-t-gray-100 pt-4 mt-auto">
        <img src="{!! asset('assets/img/logo_small_normal.svg') !!}" class="self-start fill-white"
             alt="Logo des pattes heureuses">
        <p class="text-sm font-normal text-vlack">© 2025 Les Pattes Heureuses – Tous droits réservés.</p>
    </div>
</div>
