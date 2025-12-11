<?php

use App\Models\Animal;

it('verifies if a you can access to the admin animals show page', function () {
    $animal = Animal::factory()->create();
    Livewire::test('pages::animals.show',
        [
            'animal' => $animal,
            'app_title' => 'Fiche de ' . $animal->name,
        ])
        ->assertStatus(200);
});
