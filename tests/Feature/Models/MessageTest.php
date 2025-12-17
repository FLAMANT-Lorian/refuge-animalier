<?php

use App\Models\Message;
use App\Models\User;

it('verifies if you can create a message for a user and recover it using the relation',
    function () {
        $user = User::factory()->create();
        $message = Message::factory()
            ->for($user)
            ->create();

        expect($user->messages()->first()->full_name)->toBe($message->full_name)
            ->and($message->user->email)->toBe($user->email);
    }
);
