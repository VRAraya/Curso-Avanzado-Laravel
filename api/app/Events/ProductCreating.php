<?php

namespace App\Events;

use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProductCreating
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
