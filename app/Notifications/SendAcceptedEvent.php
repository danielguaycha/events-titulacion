<?php

namespace App\Notifications;

use App\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class SendAcceptedEvent extends Notification
{
    use Queueable;

    private $event;
    private $user;

    public function __construct(Event $event, User $user)
    {
        $this->event = $event;
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmación de inscripción')
            ->greeting('Hola, ' . $this->user->person->name)
            ->line(new HtmlString(
                    'Has recibido este email para notificarte que tu inscripción al evento: <b>' .
                    Str::upper($this->event->title) . '</b>, ' .
                    'Fué procesada con éxito, recuerda que la fecha de inicio es: <b>' . $this->event->f_inicio . '</b>')
            );
        //->action('Notification Action', url('/'))
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
