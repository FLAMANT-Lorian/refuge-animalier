<?php

namespace App\Observers;

use App\Events\AdoptionRequestCreatedEvent;
use App\Models\AdoptionRequest;

class AdoptionRequestObserver
{
    /**
     * Handle the AdoptionRequest "created" event.
     */
    public function created(AdoptionRequest $adoptionRequest): void
    {
        event(new AdoptionRequestCreatedEvent($adoptionRequest));
    }

    /**
     * Handle the AdoptionRequest "updated" event.
     */
    public function updated(AdoptionRequest $adoptionRequest): void
    {
        //
    }

    /**
     * Handle the AdoptionRequest "deleted" event.
     */
    public function deleted(AdoptionRequest $adoptionRequest): void
    {
        //
    }

    /**
     * Handle the AdoptionRequest "restored" event.
     */
    public function restored(AdoptionRequest $adoptionRequest): void
    {
        //
    }

    /**
     * Handle the AdoptionRequest "force deleted" event.
     */
    public function forceDeleted(AdoptionRequest $adoptionRequest): void
    {
        //
    }
}
