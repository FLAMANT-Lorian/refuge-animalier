<?php

use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\Breed;
use App\Models\User;

it('verifies if you can create an note for a animal and recover it using the relation',
    function () {
        $animal = Animal::factory()
            ->create([
                'breed_id' => Breed::factory()->create(),
            ]);

        $animal_note = AnimalNote::factory()
            ->for($animal)
            ->create();

        expect($animal_note->full_name)->toBe($animal->animalNotes()->first()->full_name)
            ->and($animal_note->animal->name)->toBe($animal->name);
    }
);
