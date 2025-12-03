<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin animal sheets index page', function () {
    Livewire::test('pages::animal-sheets.index')
        ->assertStatus(200);
});
