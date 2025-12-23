<?php

use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\Breed;
use App\Models\User;

it('verifies if you can create an adoption-request for an animal and recover it using the relation',
    function () {

        $animal = Animal::factory()
            ->create([
                'breed_id' => Breed::factory()->create([
                    'species_id' => \App\Models\Species::factory()->create()
                ]),
            ]);

        $adoption_requests = AdoptionRequest::factory()
            ->for($animal)
            ->create();

        expect($adoption_requests->full_name)->toBe($animal->adoptionRequests()->first()->full_name);
    }
);
