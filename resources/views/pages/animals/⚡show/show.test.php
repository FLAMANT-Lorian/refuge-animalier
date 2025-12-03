<?php

use App\Models\Animal;

it('verifies if a you can access to the admin animals show page', function () {
    $animal = Animal::factory()->create()->toArray();
    Livewire::test('pages::animals.show', $animal)
        ->assertStatus(200);
});
