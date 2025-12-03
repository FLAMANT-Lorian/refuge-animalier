<main class="settings flex-1" id="content">
    <div class="px-6 py-12">

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

    </div>
</main>
