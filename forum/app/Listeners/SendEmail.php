<?php

namespace App\Listeners;

use App\Events\AccountMade;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AccountMade  $event
     * @return void
     */
    public function handle(AccountMade $event)
    {
        $tempUser = $event->user;
        \Mail::send(
            'email.newuser',
            ['user'=>$tempUser],
            function($message) use ($tempUser) {
            $message->to($tempUser->email, $tempUser->name)->subject('Confirm Your Email Address');
        });
    }
}
