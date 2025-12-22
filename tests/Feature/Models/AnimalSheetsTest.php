<?php

use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Models\Breed;
use App\Models\User;

it('verifies if you can create an sheets for an animal and recover it using the relation',
    function () {
        $user = User::factory()->create();

        $animal = Animal::factory()
            ->create([
                'breed_id' => Breed::factory()->create(),
            ]);

        $sheet = AnimalSheet::factory()
            ->for($animal)
            ->for($user)
            ->create();

        expect($sheet->animal->name)->toBe($animal->name)
            ->and($animal->animalSheet->status)->toBe($user->animalSheets()->first()->status);
    }
);
