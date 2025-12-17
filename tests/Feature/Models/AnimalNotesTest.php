<?php

use App\Models\Animal;
use App\Models\AnimalNote;
use App\Models\User;

it('verifies if you can create an note for a animal and recover it using the relation',
    function () {
        $user = User::factory()->create();
        $animal = Animal::factory()
            ->for($user)
            ->create();
        $animal_note = AnimalNote::factory()
            ->for($animal)
            ->create();

        expect($animal_note->full_name)->toBe($animal->animal_notes()->first()->full_name)
            ->and($animal_note->full_name)->toBe($user->animals()->first()->animal_notes()->first()->full_name)
            ->and($animal_note->animal->name)->toBe($animal->name);
    }
);
