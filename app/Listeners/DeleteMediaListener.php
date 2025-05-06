<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;

class DeleteMediaListener
{
    use InteractsWithQueue;

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
    public function handle($event): void
    {
        if ($event->media) {
            foreach ($event->media as $mediaItem) {
                $mediaItem->dele();
            }
        }
    }
}
