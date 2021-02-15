<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConviteEquipa extends Notification
{
    use Queueable;



    private $equipaId;

    /**
     * Create a new notification instance.
     *
     * @param $equipaId
     */
    public function __construct($equipaId)
    {
        $this->equipaId=$equipaId;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $equipa = \App\Equipa::find($this->equipaId);
        return (new MailMessage)
                    ->subject('Novo convite!')
                    ->greeting('Olá!')
                    ->line('Foste convidado para te juntares a ' . $equipa)
                    ->action('Link', url('/'))
                    ->line('Acede a este link para tomares uma decisão')
                    ->line('Os melhores cumprimentos,')
                    ->line('Eventos AAFP')
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
            'equipa_id' => $this->equipaId
        ];
    }
}
