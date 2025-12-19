<?php

use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test('pages::adoption-requests.create')
        ->assertStatus(200);
});
