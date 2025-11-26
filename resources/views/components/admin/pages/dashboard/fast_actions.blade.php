<section class="flex flex-col gap-6 p-6 border border-gray-200 rounded-2xl bg-white">
    <h3 class="text-lg font-semibold">
        Actions rapides
    </h3>
    <div class="flex flex-col gap-6">

        {{-- CRÉER UN ANIMAL --}}
        <x-admin.pages.dashboard.action_card
            title="Ajouter un animal"
            subtitle="Ajouter un nouvel animal au refuge"
            :img_path="asset('assets/img/svg/dashboard/dog.svg')"
            img_alt="Illustration d’un chien"
            :destination="route('admin.animals.create')"
            destination_title="Créer une nouvelle fiche animal"
        />

        {{-- CRÉER UN BÉNÉVOLE --}}
        <x-admin.pages.dashboard.action_card
            title="Ajouter un bénévole"
            subtitle="Enregistrer un nouveau bénévole pour votre refuge"
            :img_path="asset('assets/img/svg/dashboard/children.svg')"
            img_alt="Illustration d’un humain"
            :destination="route('admin.volunteers.create')"
            destination_title="Créer un nouveau profil bénévole"
        />
    </div>
</section>
