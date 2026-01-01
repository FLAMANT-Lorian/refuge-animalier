<?php

use App\Enums\MessageStatus;
use App\Enums\UserStatus;
use App\Models\Message;
use App\Models\User;
use Livewire\Livewire;
use function Pest\Laravel\actingAs;

describe('ADMIN USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Admin->value
        ]);

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

    it('verifies if a an admin can change the status of a message in not-read', function () {
        $message = Message::factory()->create();

        Livewire::test('pages::messages.index')
            ->call('openModal', 'message', $message->id)
            ->call('markAsNotRead', $message->id);

        $message = Message::first();
        expect($message->status)->toBe(MessageStatus::Unread->value);
    });

    it('verifies if a an admin can change the status of a message in read', function () {
        $message = Message::factory()->create(
            ['status' => MessageStatus::Unread->value]
        );

        Livewire::test('pages::messages.index')
            ->call('openModal', 'message', $message->id);

        $message = Message::first();
        expect($message->status)->toBe(MessageStatus::Read->value);
    });
});

describe('VOLUNTEER USER', function () {
    beforeEach(function () {
        $this->user = User::factory()->create([
            'role' => UserStatus::Volunteer->value
        ]);

        actingAs($this->user);
    });

    it('verifies if a you can’t access to the admin messages index page', function () {

        Livewire::test('pages::messages.index')
            ->assertForbidden();
    });
});
