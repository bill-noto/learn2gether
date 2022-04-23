<?php

namespace App\Listeners;

use App\Events\ButtonPressed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateChat
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
     * @param ButtonPressed $event
     * @return void
     */
    public function handle(ButtonPressed $event)
    {
         return $event;
    }
}
