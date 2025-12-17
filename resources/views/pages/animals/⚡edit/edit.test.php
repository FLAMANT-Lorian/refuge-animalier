<?php

use App\Models\Animal;
use Livewire\Livewire;
use App\Models\User;

it('verifies if a you can access to the admin animals edit page', function () {
    $user = User::factory()->create();

    $animal = Animal::factory()
        ->create();

    Livewire::test('pages::animals.edit',
        [
            'animal' => $animal,
        ])
        ->assertStatus(200);
});
