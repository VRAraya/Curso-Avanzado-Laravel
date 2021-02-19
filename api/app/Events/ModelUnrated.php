<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Model;

class ModelUnrated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private Model $qualifier;
    private Model $unrateable;

    public function __construct(Model $qualifier, Model $unrateable)
    {
        $this->qualifier = $qualifier;
        $this->unrateable = $unrateable;
    }

    public function getQualifier(): Model
    {
        return $this->qualifier;
    }

    public function getUnrateable(): Model
    {
        return $this->unrateable;
    }
}
