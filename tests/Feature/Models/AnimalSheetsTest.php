<?php

use App\Models\Animal;
use App\Models\AnimalSheet;
use App\Models\User;

it('verifies if you can create an sheets for an animal and recover it using the relation',
    function () {
        $user = User::factory()->create();

        $animal = Animal::factory()
            ->for($user)
            ->create();

        $sheet = AnimalSheet::factory()
            ->for($animal)
            ->for($user)
            ->create();

        expect($sheet->animal->name)->toBe($animal->name)
            ->and($user->animals()->first()->animalSheet->status)->toBe($sheet->status)
            ->and($sheet->user->email)->toBe($user->email)
            ->and($user->animalSheets()->first()->status)->toBe($sheet->status);
    }
);
