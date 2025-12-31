<?php

namespace App\Listeners;

use App\Enums\AdoptionRequestsStatus;
use App\Events\AdoptionRequestUpdatedEvent;
use App\Mail\AdoptionRequestUpdatedMail;
use Illuminate\Support\Facades\Mail;

class AdoptionRequestUpdatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AdoptionRequestUpdatedEvent $event): void
    {
        if ($event->adoptionRequest->status === AdoptionRequestsStatus::Refused->value ||
            $event->adoptionRequest->status === AdoptionRequestsStatus::InWay->value) {
            Mail::to($event->adoptionRequest->email)->queue(new AdoptionRequestUpdatedMail($event->adoptionRequest));
        }
    }
}
