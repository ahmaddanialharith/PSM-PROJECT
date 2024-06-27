<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportCompleted extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your smartphone repair is completed and ready to be delivered.')
                    ->line('Thank you for your patience.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
