<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReportInProgress extends Notification
{
    use Queueable;

    public function via($notifiable)
    { 
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Your report is now in progress.')
                    ->line('Thank you for your patience.');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
