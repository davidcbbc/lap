<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RecuperarPass extends Notification
{
    use Queueable;

    private $recuperarLink;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($recuperarLink)
    {
        $this->recuperarLink=$recuperarLink;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                ->level('info')
                ->subject('Recuperar password')
                ->greeting('Olá!')
                ->line('Reparamos que perdeste a tua password e pretendes recuperá-la')
                ->action('Link', config('app.url') .$this->recuperarLink)
                ->line('Acede a este link para recuperares a tua password');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
