<?php

use App\Models\Animal;
use App\Models\User;

it('verifies if you can create an animal for a user',
    function () {
        $user = User::factory()->create();

        $animal = Animal::factory()
            ->for($user)
            ->create();

        expect($user->animals()->count())->toBe(1)
            ->and($animal->name)->toBe($user->animals()->first()->name);
    }
);
