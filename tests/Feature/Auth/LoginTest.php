<?php

use App\Models\User;

it('verifies if a guest can access to login page',
    function () {
        $response = $this->get(route('login'));

        $response->assertStatus(200);
    }
);

it('verifies if a user is redirected to dashboard page after a successful login',
    function () {
        $password = '1234567890';
        $user = User::factory()->create(
            [
                'email' => 'lorian@test.be',
                'password' => bcrypt($password)
            ]
        );

        $response = $this
            ->post(route('login.store'), [
                'email' => $user->email,
                'password' => $password
            ]);

        $response
            ->assertRedirect(route('admin.dashboard'))
            ->assertStatus(302);
    }
);

it('verifies if a user is redirected to login page after a unsuccessful login',
    function () {

        $response = $this
            ->from('/fr/login')->
            post(route('login.store'), [
            'email' => 'wrong-email',
            'password' => 'wrong-password'
        ]);

        $response
            ->assertInvalid(['email'])
            ->assertRedirect('/fr/login')
            ->assertStatus(302);
    }
);

it('verifies if required validation are applied',
    function () {

        $response = $this
            ->from('/fr/login')->
            post(route('login.store'), [
                'email' => '',
                'password' => ''
            ]);

        $response
            ->assertInvalid(['email', 'password'])
            ->assertRedirect('/fr/login')
            ->assertStatus(302);
    }
);
