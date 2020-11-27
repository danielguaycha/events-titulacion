@extends('layouts.index')

@section('content')
    @include('_globals.home._header', ['rel' => false])
    <div class="container evento-container">
        <div class="ei-verify">
            <div class="title">
                <h3>{{ $event->title }}</h3>
                <h5 class="card-subtitle mb-2">{{ $event->sponsor->name }}</h5>
                @if ($event->description)
                    <p class="card-text">{{ $event->description }}</p>
                @endif
            </div>
            <div class="body">
                <ul class="ei-event-list">
                    @if ($event->hours > 0)
                        <li><span>Horas: </span> <b>{{ $event->hours }}</b></li>
                    @endif
                    <li><span>Fecha Inicio: </span>
                        <b>{{ \Carbon\Carbon::parse($event->f_inicio)->isoFormat("D/MMM/Y") }}</b></li>
                    <li><span>Fecha Fin: </span>
                        <b>{{ \Carbon\Carbon::parse($event->f_fin)->isoFormat("D/MMM/Y") }}</b></li>
                    <li><span>Matricula: </span> <b>{{ $event->matriculaDate() }}</b>
                    </li>
                    <li><span>Tipo: </span> <b>{{ $event->type() }}</b></li>
                </ul>
            </div>

            <div class="footer">
                @if (\Carbon\Carbon::now()->isAfter($event->f_fin))
                    <a class="ei-btn danger-outline rounded sm disabled">Evento Finalizado</a>

                @else
                    @if (\Carbon\Carbon::now()->isAfter($event->matricula_fin))
                        <a class="ei-btn disabled rounded sm warning-outline">Periodo de matricula
                            finalizado</a>

                    @else
                        @if (!$event->isPostulante(Auth::user()->id))
                            <a href="{{ route('events.postular', ['event' => $event->id]) }}"
                               class="ei-btn success rounded sm"><i class="fi fi-avion-de-papel"></i>Inscribirme</a>
                        @else
                            <a class="ei-btn info sm rounded disabled">
                                <i class="fi fi-me-gusta"></i>
                                Inscrito</a>
                        @endif
                    @endif
                @endif
            </div>

        </div>
    </div>
    @include('_globals.home._footer', ['rel' => false])
@endsection
