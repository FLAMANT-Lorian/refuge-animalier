<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin dashboard page', function () {
    Livewire::test('pages::dashboard')
        ->assertStatus(200);
});
