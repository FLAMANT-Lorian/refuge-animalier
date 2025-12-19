<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::adoption-requests.edit')
        ->assertStatus(200);
});
