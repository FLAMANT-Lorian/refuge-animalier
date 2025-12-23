<?php

use App\Models\Animal;
use App\Models\Breed;
use App\Models\Species;

it('verifies if you can create a breed-species for an animal and recover it using the relation', function () {
    $species_db = Species::factory()
        ->has(
            Breed::factory()
                ->has(Animal::factory())
        )
        ->create();

    $animal = $species_db->breeds->first()->animals->first();
    $species = $species_db;
    $breed = $species_db->breeds->first();

    expect($animal->breed->name)->toBe($breed->name)
        ->and($species->name)->toBe($animal->breed->species->name)
        ->and($breed->animals->first()->name)->toBe($animal->name);
});
