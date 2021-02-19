<?php

namespace App\Listeners;

use App\Events\ModelRated;
use App\Models\Product;
use App\Notifications\ModelRatedNotification;

class SendEmailModelRatedNotification
{
    public function handle(ModelRated $event)
    {
        $rateable = $event->getRateable();

        if($rateable instanceOf Product) {
            $notification = new ModelRatedNotification(
                $event->getQualifier()->name,
                $rateable->name,
                $event->getScore()
            );

            $rateable->createdBy->notify($notification);
        }
    }
}
