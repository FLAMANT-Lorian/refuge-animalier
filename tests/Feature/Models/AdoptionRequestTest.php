<?php

use App\Models\AdoptionRequest;
use App\Models\Animal;
use App\Models\User;

it('verifies if you can create an adoption-request for an animal and recover it using the relation',
    function () {
        $user = User::factory()->create();

        $animal = Animal::factory()
            ->for($user)
            ->create();

        $adoption_requests = AdoptionRequest::factory()
            ->for($animal)
            ->create();

        expect($adoption_requests->full_name)->toBe($animal->adoptionRequests()->first()->full_name)
            ->and($animal->adoptionRequests()->first()->full_name)->toBe($user->animals()->first()->adoptionRequests()->first()->full_name);
    }
);
