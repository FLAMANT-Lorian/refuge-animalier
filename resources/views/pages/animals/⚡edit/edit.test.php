<?php

use App\Models\Animal;
use Livewire\Livewire;

it('verifies if a you can access to the admin animals edit page', function () {
    $animal = Animal::factory()->create();

    Livewire::test('pages::animals.edit',
        [
            'animal' => $animal,
        ])
        ->assertStatus(200);
});
