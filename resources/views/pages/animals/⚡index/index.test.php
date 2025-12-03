<?php

use Livewire\Livewire;

it('verifies if a you can access to the admin animals index page', function () {
    Livewire::test('pages::animals.index')
        ->assertStatus(200);
});
