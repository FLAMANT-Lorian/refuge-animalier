<?php

namespace App\Listeners;

use App\Events\VolunteerCreatedEvent;
use App\Mail\VolunteerCreatedMail;
use Illuminate\Support\Facades\Mail;

class VolunteerCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    public function handle(VolunteerCreatedEvent $event): void
    {
        Mail::to($event->volunteer->email)->queue(new VolunteerCreatedMail(
            [
                'email' => $event->volunteer->email,
                'password' => $event->password
            ]
        ));
    }
}
