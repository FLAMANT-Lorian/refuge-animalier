<?php

use App\Enums\UserStatus;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);

        actingAs($this->user);
    });

    it('verifies if an admin can access to the admin volunteers create page', function () {
        Livewire::test('pages::volunteers.create')
            ->assertOK();
    });

    it('verifies if an admin can create a volunteer profile', function () {
        Livewire::test('pages::volunteers.create')
            ->set('volunteerForm.last_name', 'toto')
            ->set('volunteerForm.first_name', 'toto')
            ->set('volunteerForm.email', 'toto@toto.be')
            ->set('volunteerForm.password', '1234567890')
            ->call('save');

        assertDatabaseCount('users', 2);

        $volunteer = User::where('role', UserStatus::Volunteer->value)->first();

        expect($volunteer->email)->toBe('toto@toto.be');
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if an admin can access to the admin volunteers create page', function () {
        Livewire::test('pages::volunteers.create')
            ->assertForbidden();
    });
});
