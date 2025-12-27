<?php

use App\Enums\UserStatus;
use App\Enums\VolunteerStatus;
use App\Models\User;
use function Pest\Laravel\actingAs;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'first_name' => 'titi',
            'last_name' => 'titi',
            'email' => 'titi@titi.be',
            'notifications' => [
                'adoption_requests' => false,
                'animal_sheets' => false,
                'messages' => false,
                'activity_report' => false,
            ],
            'availability' => [
                'monday' => '',
                'tuesday' => '',
                'wednesday' => '',
                'thursday' => '',
                'friday' => '',
                'saturday' => '',
                'sunday' => '',
            ],
            'role' => UserStatus::Admin->value,
            'status' => VolunteerStatus::Active->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a you can access to the admin settings page', function () {
        Livewire::test('pages::settings')
            ->assertOk();
    });

    it('verifies if an admin can update his information', function () {

        Livewire::test('pages::settings')
            ->set('form.last_name', 'toto')
            ->set('form.notifications.messages', true)
            ->set('form.availability.monday', 'toto')
            ->call('save');

        $this->user->refresh();

        expect($this->user->last_name)->toBe('toto')
            ->and($this->user->availability['monday'])->toBe('toto')
            ->and($this->user->notifications['messages'])->toBeTrue();
    });
});
