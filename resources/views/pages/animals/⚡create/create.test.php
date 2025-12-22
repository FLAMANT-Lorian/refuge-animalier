<?php

use App\Models\Breed;
use Livewire\Livewire;

it('verifies if a you can access to the admin animals create page', function () {
    $breeds = Breed::factory()->count(50)->create();

    Livewire::test('pages::animals.create')
        ->assertStatus(200);
});
