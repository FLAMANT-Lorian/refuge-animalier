<?php

use App\Models\Animal;
use App\Models\User;

it('verifies if a you can access to the admin animals show page', function () {
    $user = User::factory()->create();

    $animal = Animal::factory()
        ->for($user)
        ->create();
    Livewire::test('pages::animals.show',
        [
            'animal' => $animal,
            'app_title' => 'Fiche de ' . $animal->name,
        ])
        ->assertStatus(200);
});
