<?php

use App\Models\User;
use Livewire\Livewire;

it('verifies if a you can access to the admin adoption requests index page',
    function () {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test('pages::adoption-requests.index')
            ->assertStatus(200);
    }
);

