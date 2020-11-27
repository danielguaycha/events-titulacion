<?php

namespace App\Jobs;

use App\Event;
use App\EventPostulant;
use App\Notifications\SendAcceptedEvent;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class NotifyPostulant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $postulante;

    public function __construct(EventPostulant $postulante)
    {
        $this->postulante = $postulante;
    }

    public function handle()
    {
        $user = User::with('person')->findOrFail($this->postulante->user_id);
        $event = Event::findOrFail($this->postulante->event_id);

        $user->notify(new SendAcceptedEvent($event, $user));

        if (!Mail::failures()) {
            $this->postulante->update([
                'status' => EventPostulant::STATUS_NOTIFICADO
            ]);
        }
    }
}
