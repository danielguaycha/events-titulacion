<?php

namespace App\Http\Controllers\Admin;

use App\Event;
use App\EventParticipant;
use App\EventPostulant;
use App\Http\Controllers\Controller;
use App\Jobs\NotifyPostulant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostulanteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:events.postulantes.index')->only(['index', 'list']);
        $this->middleware('permission:events.postulantes.accept')->only(['acceptOrDeny', 'acceptAll']);
        $this->middleware('permission:events.postulantes.mail')->only(['sendAcceptMail', 'listAccepted']);
    }

    public function index($event){
        $event = Event::findOrFail($event);
        return view('events.postulantes.index', ['event' => $event]);
    }

    // aceptar la postulación o denegar
    public function acceptOrDeny($id){
        DB::beginTransaction();
        $e = EventPostulant::findOrFail($id);
        if ($e->status === EventPostulant::STATUS_OK) {
            EventParticipant::where([
                ['user_id' , $e->user_id],
                ['event_id' , $e->event_id]
            ])->delete();
            $status = EventPostulant::STATUS_PENDIENTE;
        } else if ($e->status === EventPostulant::STATUS_PENDIENTE) {
            $status = EventPostulant::STATUS_OK;
            EventParticipant::create([
                'event_id' => $e->event_id,
                'user_id' =>  $e->user_id
            ]);
        } else {
            $status = $e->status;
        }

        $e->update(['status' => $status]);
        DB::commit();

        return response()->json(['ok' => true,
            'body' => $e->status,
            'message' => 'Estado cambiado a '.$e->getStatus()]);
    }

    // aceptar un array
    public function acceptAll(Request $request){
        $request->validate([
           'postulantes' => 'required|array',
            'postulantes.*' => 'numeric|exists:event_postulant,id'
        ]);
        DB::beginTransaction();
        foreach ($request->get('postulantes') as $p) {
            $e = EventPostulant::find($p);
            EventParticipant::create([
                'event_id' => $e->event_id,
                'user_id' =>  $e->user_id
            ]);
            $e->update([
                'status' => EventPostulant::STATUS_OK
            ]);
        }

        DB::commit();

        return response()->json([
           'ok' => true,
           'message' => 'Postulaciones marcadas como aceptadas'
        ]);
    }

    //API: listar todos los postulantes
    public function list($event) {
        $p = EventPostulant::join('users', 'users.id', 'event_postulant.user_id')
            ->join('persons', 'persons.id', 'users.person_id')
            ->select(
                'event_postulant.id',
                'event_postulant.status',
                'persons.name', 'persons.surname', 'users.id as user_id'
            )
            ->where('event_postulant.event_id', $event)
            ->orderBy('persons.surname', 'asc')
            ->paginate(50);
        return response()->json(['ok' => true, 'body' => $p], 200);
    }

    //API: listar postulantes aprobados
    public function listAccepted($event)
    {
        $p = EventPostulant::where([
            ['status', EventPostulant::STATUS_OK],
            ['event_id', $event]
        ])
            ->select('id', 'status')->get();

        return response()->json(['ok' => true, 'body' => $p]);
    }

    public function sendAcceptMail($id)
    {
        $e = EventPostulant::findOrFail($id);
        if ($e->status === EventPostulant::STATUS_PENDIENTE) {
            return response()->json(['ok' => false, 'message' => 'El estudiante no ha sido aceptado'], 400);
        }

        NotifyPostulant::dispatchAfterResponse($e);

        return response()->json([
            'ok' => true,
            'message' => 'Notificación enviada correctamente'
        ]);
    }
}
