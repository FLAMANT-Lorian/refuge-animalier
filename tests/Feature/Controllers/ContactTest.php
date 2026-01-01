<?php

use App\Enums\UserStatus;
use App\Mail\MessageCreatedMail;
use App\Models\Message;
use App\Models\User;
use function Pest\Laravel\assertDatabaseCount;

it('verifies if you can send a message using the contact form with valid data', function () {

    $data = [
        'full_name' => 'toto',
        'email' => 'toto@test.be',
        'object' => 'toto',
        'message' => 'toto'
    ];

    $response = $this->from(route('public.contact', ['locale' => app()->getLocale()]))
        ->post(route('public.contact.store', ['locale' => app()->getLocale()]), $data);


    $response->assertStatus(302)
        ->assertRedirect('/' . app()->getLocale() . '/contact');

    assertDatabaseCount('messages', 1);
});

it('verifies if you have an error when you submit the contact form with invalid data', function () {

    $data = [
        'email' => '',
        'object' => '',
        'message' => ''
    ];

    $response = $this->from(route('public.contact', ['locale' => app()->getLocale()]))
        ->post(route('public.contact.store', ['locale' => app()->getLocale()]), $data);

    $response->assertInvalid(['email', 'message']);
    assertDatabaseCount('messages', 0);
});

it('verifies if the content in the mail is correct ', function () {
    $message = Message::factory()->create();

    $mail = new MessageCreatedMail($message);

    $mail->assertSeeInHtml('Nouveau message');
    $mail->assertSeeInHtml($message->email);
    $mail->assertHasSubject('Nouveau message');
});
