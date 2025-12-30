<?php

namespace App\Observers;

use App\Events\AnimalSheetCreatedEvent;
use App\Models\AnimalSheet;

class AnimalSheetObserver
{
    /**
     * Handle the AnimalSheet "created" event.
     */
    public function created(AnimalSheet $animalSheet): void
    {
        event(new AnimalSheetCreatedEvent($animalSheet));
    }

    /**
     * Handle the AnimalSheet "updated" event.
     */
    public function updated(AnimalSheet $animalSheet): void
    {
        //
    }

    /**
     * Handle the AnimalSheet "deleted" event.
     */
    public function deleted(AnimalSheet $animalSheet): void
    {
        //
    }

    /**
     * Handle the AnimalSheet "restored" event.
     */
    public function restored(AnimalSheet $animalSheet): void
    {
        //
    }

    /**
     * Handle the AnimalSheet "force deleted" event.
     */
    public function forceDeleted(AnimalSheet $animalSheet): void
    {
        //
    }
}
