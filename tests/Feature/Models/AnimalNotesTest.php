<?php

use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;

it('verifies if you can create an note for a animal and recover it using the relation',
    function () {
        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $animal_note = AnimalNote::factory()
            ->for($animal)
            ->create();

        expect($animal_note->full_name)->toBe($animal->animalNotes()->first()->full_name)
            ->and($animal_note->animal->name)->toBe($animal->name);
    }
);
