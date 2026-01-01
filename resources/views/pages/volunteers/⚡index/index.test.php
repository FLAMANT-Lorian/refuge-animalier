<?php

use App\Enums\UserStatus;
use App\Mail\VolunteerCreatedMail;
use App\Models\User;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a you can access to the admin volunteers index page', function () {
        Livewire::test('pages::volunteers.index')
            ->assertStatus(200);
    });

    it('verifies if tou can see all users with volunteer status on volunteer index page',
        function () {
            $volunteer = User::factory()->create([
                'role' => UserStatus::Volunteer->value,
            ]);

            $admin = User::factory()->create([
                'role' => UserStatus::Admin->value,
            ]);

            Livewire::test('pages::volunteers.index')
                ->assertSee($volunteer->full_name)
                ->assertDontSee($admin->full_name);
        }
    );
});

it('verifies if the content in the mail is correct ', function () {
    $plain_password = '1234567890';
    $user = User::factory()->create(['role' => UserStatus::Volunteer->value, 'password' => Hash::make($plain_password)]);

    $mail = new VolunteerCreatedMail(['email' => $user->email, 'password' => $plain_password]);

    $mail->assertSeeInHtml('Bienvenue au refuge les pattes heureuses ! 👋');
    $mail->assertSeeInHtml($user->email);
    $mail->assertSeeInHtml($plain_password);
    $mail->assertHasSubject('Votre compte bénévole – Identifiant');
});
