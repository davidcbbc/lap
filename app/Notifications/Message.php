<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Message extends Notification
{
    use Queueable;

    private $tipo;
    private $content;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($tipo, $content)
    {
        $this->tipo=$tipo;
        $this->content=$content;
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
        return (new MailMessage)
                    ->level('info')
                    ->subject('Recebeste uma mensagem!')
                    ->greeting('Olá!')
                    ->line('Acabaste de receber uma mensagem nova, não ignores , pode ser importante!')
                    ->action('Link', url('/notificacoes'))
                    ->line('Acede a este link para veres todas as tuas notificações');
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
            'tipo' => $this->tipo,
            'content' => $this->content
        ];
    }
}
