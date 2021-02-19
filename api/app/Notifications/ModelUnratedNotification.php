<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ModelUnratedNotification extends Notification
{
    use Queueable;

    private string $qualifierName;
    private string $productName;

    public function __construct(string $qualifierName, string $productName)
    {
        $this->qualifierName = $qualifierName;
        $this->productName = $productName;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line("{$this->qualifierName} has unrated your product
            {$this->productName}");
    }
}
