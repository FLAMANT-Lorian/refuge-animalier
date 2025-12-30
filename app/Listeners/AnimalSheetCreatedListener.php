<?php

namespace App\Listeners;

use App\Enums\UserStatus;
use App\Events\AnimalSheetCreatedEvent;
use App\Mail\AnimalSheetCreatedMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AnimalSheetCreatedListener
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
    public function handle(AnimalSheetCreatedEvent $event): void
    {
        $admin_users = User::where('role', UserStatus::Admin->value)->get();

        foreach ($admin_users as $admin_user) {
            Mail::to($admin_user->email)->queue(new AnimalSheetCreatedMail($event->animalSheet));
        }
    }
}
