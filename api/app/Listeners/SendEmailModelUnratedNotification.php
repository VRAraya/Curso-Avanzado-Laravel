<?php

namespace App\Listeners;

use App\Events\ModelUnrated;
use App\Models\Product;
use App\Notifications\ModelUnratedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailModelUnratedNotification implements ShouldQueue
{
    public function handle(ModelUnrated $event)
    {
        $unrateable = $event->getUnrateable();

        if($unrateable instanceOf Product) {
            $notification = new ModelUnratedNotification(
                $event->getQualifier()->name,
                $unrateable->name
            );
            
            $unrateable->createdBy->notify($notification);
        }
    }
}
