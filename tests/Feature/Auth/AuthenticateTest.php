<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $user = User::factory()->create();

        actingAs($user);
    });

    it('verifies if a connected user is redirected to dashboard page when he try to access to login page',
        function () {

            $response = $this->get(route('login'));

            $response
                ->assertRedirect(route('admin.dashboard'))
                ->assertStatus(302);
        }
    );

    it('verifies if you are redirected to login route when you logout',
        function () {

            $response = $this->post(route('logout'));

            $response
                ->assertRedirect('/fr/login')
                ->assertStatus(302);
        }
    );
});
