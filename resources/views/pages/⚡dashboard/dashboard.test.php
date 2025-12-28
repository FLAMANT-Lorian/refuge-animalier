<?php

use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();

        actingAs($this->user);
    });

    it('verifies if a you can access to the admin dashboard page', function () {
        Livewire::test('pages::dashboard')
            ->assertStatus(200);
    });
});
