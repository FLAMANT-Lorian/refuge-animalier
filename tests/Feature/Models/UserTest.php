<?php

use App\Enums\UserStatus;
use App\Models\User;

it('verfies if you can get the fullName of a user in database',
    function () {
        $user = User::factory()->create();

        $full_name = $user->full_name;

        expect($full_name)->toBe($user->last_name . ' ' . $user->first_name);
    }
);

it('verifies if you can confirm that a user is admin or volunteer',
    function () {
        $user1 = User::factory()->create(['role' => UserStatus::Admin->value]);
        $user2 = User::factory()->create(['role' => UserStatus::Volunteer->value]);

        $user1IsAdmin = $user1->isAdmin();
        $user1IsVolunteer = $user1->isVolunteer();
        $user2IsAdmin = $user2->isAdmin();
        $user2IsVolunteer = $user2->isVolunteer();

        expect($user1IsAdmin)->toBeTrue()
            ->and($user1IsVolunteer)->toBeFalse()
            ->and($user2IsAdmin)->toBeFalse()
            ->and($user2IsVolunteer)->toBeTrue();


    }
);
