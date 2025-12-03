<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin volunteers show page', function () {
    Livewire::test('pages::volunteers.show', ['id' => 1])
        ->assertStatus(200);
});
