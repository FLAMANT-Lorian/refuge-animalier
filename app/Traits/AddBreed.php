<?php

namespace App\Traits;

use App\Livewire\Forms\BreedCreateForm;
use App\Models\Breed;

trait AddBreed
{
    public function addBreedModal(BreedCreateForm $form): void
    {
        $this->authorize('create', Breed::class);

        $form->validate();

        $form->store();

        $this->closeModal();
    }
}
