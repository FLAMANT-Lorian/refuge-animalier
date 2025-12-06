@props([
    'animal'
])

<section>
    <h2 class="text-lg font-semibold text-red pb-1">Supprimer la fiche de l’animal</h2>
    <p class="font-base pb-6 text-gray-500">Après suppression, cette fiche ne pourra plus être récupérée !</p>

    <x-forms.buttons.delete
        wire:click="openModal('delete-animal', {!! $animal !!})"
        label="Supprimer la fiche de l’animal"/>
</section>
