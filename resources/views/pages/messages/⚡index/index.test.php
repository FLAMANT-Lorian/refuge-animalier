<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin messages index page', function () {

    Livewire::test('pages::messages.index')
        ->assertStatus(200);
});
