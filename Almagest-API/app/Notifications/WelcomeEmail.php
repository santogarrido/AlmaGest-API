<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class WelcomeEmail extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Bienvenido a Almagest')
                    ->greeting('Hola ' . $notifiable->firstname . '!')
                    ->line('Gracias por registrarte en nuestra plataforma.')
                    ->line('Puedes empezar a usar tu cuenta de inmediato.');
    }
}
