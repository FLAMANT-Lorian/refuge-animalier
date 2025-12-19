<?php

use App\Models\Message;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('CONNECTED USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        actingAs($this->user);
    });

    it('verifies if a you can access to the admin messages index page', function () {

        Livewire::test('pages::messages.index')
            ->assertStatus(200);
    });

    it('verifies if a user can see all messages',
        function () {

            $message = Message::factory()->create();

            Livewire::test('pages::messages.index')
                ->assertSee($message->email);
        }
    );
});
