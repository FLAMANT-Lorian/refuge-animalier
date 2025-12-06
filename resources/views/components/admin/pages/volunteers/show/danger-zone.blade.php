<section>
    <h2 class="text-lg font-semibold text-red pb-1">Supprimer le bénévole</h2>
    <p class="font-base pb-6 text-gray-500">Après suppression, ce compte ne pourra plus être récupéré !</p>

    <x-forms.buttons.delete
        wire:click="openModal('delete-volunteer')"
        label="Supprimer le bénévole"/>
</section>
