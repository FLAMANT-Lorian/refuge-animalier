<main class="settings flex-1 px-6 md:px-12 py-12 flex flex-col gap-6" id="content">
    <div class="flex flex-col gap-10 lg:bg-white lg:border lg:border-gray-200 lg:rounded-2xl lg:p-6">

        {{-- EN-TÊTE --}}
        <section class="flex flex-col gap-4">
            {{-- FIL D'ARIANE --}}
            <a wire:navigate href="{!! route('admin.settings') !!}"
               class="self-start font-bold text-gray-500">| {!! $app_title !!}
            </a>

            <div class="flex flex-col gap-1">
                <h2 class="text-2xl font-bold">Paramètres</h2>
                <p>Les champs renseignés avec <strong class="text-red">*</strong> sont obligatoires</p>
            </div>
        </section>

        {{-- FORMULAIRE --}}
        <x-admin.pages.settings.base-section/>

    </div>

    {{-- FORMULAIRE DE CHANGEMENT DE MOT DE PASSE--}}
    <div class="flex flex-col gap-10 bg-white border border-gray-200 rounded-2xl p-6">
        <x-admin.pages.settings.change-password-section/>
    </div>
</main>
