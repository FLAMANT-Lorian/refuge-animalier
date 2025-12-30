<?php

use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Models\Breed;
use App\Models\Species;
use App\Models\User;

it('verifies if you can create an sheets for an animal and recover it using the relation',
    function () {
        $user = User::factory()->create();

        $species = Species::factory()->create();
        $breed = Breed::factory()->for($species)->create();
        $animal = Animal::factory()->for($breed)->create();

        $sheet = AnimalSheet::factory()
            ->for($animal)
            ->for($user)
            ->create();

        expect($sheet->animal->name)->toBe($animal->name)
            ->and($animal->animalSheets()->first()->status)->toBe($user->animalSheets()->first()->status);
    }
);
