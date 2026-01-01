<?php

namespace App\Listeners;

use App\Enums\UserStatus;
use App\Events\AdoptionRequestCreatedEvent;
use App\Mail\AdoptionRequestCreatedMail;
use App\Mail\MessageCreatedMail;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class AdoptionRequestCreatedListener
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
    public function handle(AdoptionRequestCreatedEvent $event): void
    {
        $admin_users = User::where('role', UserStatus::Admin->value)->get();

        foreach ($admin_users as $admin_user) {
            if ($admin_user->notifications['adoption_requests']) {
                Mail::to($admin_user->email)->queue(new AdoptionRequestCreatedMail($event->adoptionRequest));
            }
        }
    }
}
