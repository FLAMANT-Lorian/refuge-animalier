<?php

use App\Enums\UserStatus;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseCount;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);

        actingAs($this->user);
    });

    it('verifies if data in volunteer edit page are correct',
        function () {
            $volunteer = User::factory()->create([
                'role' => UserStatus::Volunteer->value
            ]);

            Livewire::test('pages::volunteers.edit', ['volunteer' => $volunteer])
                ->assertSee($volunteer->first_name);
        }
    );

    it('verifies if an admin can edit–delete a volunteer profile', function () {
        $volunteer = User::factory()->create([
            'role' => UserStatus::Volunteer->value,
            'email' => 'toto@toto.be'
        ]);

        Livewire::test('pages::volunteers.edit', ['volunteer' => $volunteer])
            ->set('form.email', 'titi@titi.be')
            ->call('save');

        $new_volunteer = User::where('role', UserStatus::Volunteer->value)->first();

        expect($new_volunteer->email)->toBe('titi@titi.be');
    });

    it('tests validation on edit volunteer form', function () {
        $volunteer = User::factory()->create([
            'role' => UserStatus::Volunteer->value,
            'email' => 'toto@toto.be'
        ]);

        Livewire::test('pages::volunteers.edit', ['volunteer' => $volunteer])
            ->set('form.last_name', '')
            ->set('form.first_name', '')
            ->set('form.email', '')
            ->call('save')
            ->assertHasErrors(['form.last_name', 'form.first_name', 'form.email']);

        Livewire::test('pages::volunteers.edit', ['volunteer' => $volunteer])
            ->set('form.last_name', 'toto')
            ->set('form.first_name', 'toto')
            ->set('form.email', 'toto')
            ->call('save')
            ->assertHasErrors(['form.email']);
    });

    it('verifies if an admin can delete a volunteer profile', function () {
        $volunteer = User::factory()->create([
            'role' => UserStatus::Volunteer->value,
            'email' => 'toto@toto.be'
        ]);

        Livewire::test('pages::volunteers.edit', ['volunteer' => $volunteer])
            ->call('openModal', 'delete-volunteer')
            ->call('deleteVolunteer');

        assertDatabaseCount('users', 1);
    });
});
