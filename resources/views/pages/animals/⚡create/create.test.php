<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin animals create page', function () {
    Livewire::test('pages::animals.create')
        ->assertStatus(200);
});
