<?php

namespace App\Listeners;

use App\Events\AnimalSheetUpdatedEvent;
use App\Mail\AnimalSheetUpdatedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AnimalSheetUpdatedListener
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
    public function handle(AnimalSheetUpdatedEvent $event): void
    {
        Mail::to($event->animalSheet->user->email)->queue(new AnimalSheetUpdatedMail($event->animalSheet));
    }
}
