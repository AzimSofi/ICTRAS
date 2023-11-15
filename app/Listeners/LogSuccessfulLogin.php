<?php

namespace App\Listeners;

use App\Models\Userlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
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
    public function handle(object $event): void
    {
        Userlog::create([
            'user_id' => $event->user->matric_no,
            'ip_address' => request()->ip(),
            'login_at' => now(),
        ]);
    }
}
