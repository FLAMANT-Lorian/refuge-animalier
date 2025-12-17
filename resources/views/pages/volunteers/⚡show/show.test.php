<?php

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();

        actingAs($this->user);
    });

    it('verifies if data in volunteer show page are correct',
        function () {
            $volunteer = User::factory()->create([
                'role' => UserStatus::Volunteer->value
            ]);

            Livewire::test('pages::volunteers.show', ['volunteer' => $volunteer])
            ->assertSee($volunteer->first_name);
        }
    );
});
