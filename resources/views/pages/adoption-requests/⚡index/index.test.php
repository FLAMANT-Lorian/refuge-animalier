<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin adoption requests index page', function () {
    Livewire::test('pages::adoption-requests.index')
        ->assertStatus(200);
});

