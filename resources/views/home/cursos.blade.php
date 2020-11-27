@extends('layouts.index')
@push('styles')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endpush
@section('content')
    @include('_globals.home._header', ['rel' => false])

    <div class="container">

        @if(count($eventos) <= 0)
            <div class="nothing">
                <h2>No hay eventos disponibles</h2>
                <i class="fi fi-certificado"></i>
            </div>
        @else
            <div class="evento-container">
                <div class="eventos-title">
                    #Eventos
                </div>
                <div class="grid-content eventos">
                    @foreach($eventos as $e)
                        <div class="evento item">
                            <div class="content-evento">
                                <h3>{{ $e->title }}</h3>
                                <div class="extra-info">
                                    <i class="fi fi-certificado"></i>
                                    <div class="info">
                                        <div>
                                            <span class="{{ $e->type }}">{{ $e->type() }}</span>
                                            <small>Tipo</small>
                                        </div>
                                        <div>
                                            <span>{{ $e->hours }}h</span>
                                            <small>Duración</small>
                                        </div>
                                    </div>

                                    <div class="info">
                                        <div>
                                            <span>{{ \Carbon\Carbon::parse($e->f_inicio)->format('d-M-Y') }}</span>
                                            <small>Fecha inicio</small>
                                        </div>
                                        <div>
                                            <span>{{ \Carbon\Carbon::parse($e->matricula_fin)->format('d-M-Y') }}</span>
                                            <small>Limite matricula</small>
                                        </div>
                                    </div>
                                    <i class="fi fi-calendario"></i>
                                </div>

                                <small class="sponsor">Por: {{ $e->sponsor->name }}</small>

                                @if (\Carbon\Carbon::now()->isAfter($e->f_fin))
                                    <a class="ei-btn danger-outline rounded sm disabled">Evento Finalizado</a>

                                @else
                                    @if (\Carbon\Carbon::now()->isAfter($e->matricula_fin))
                                        <a class="ei-btn disabled rounded sm warning-outline">Periodo de matricula
                                            finalizado</a>

                                    @else
                                        @if (!$e->isPostulante(Auth::user()->id))
                                            <a href="{{ route('events.postular', ['event' => $e->id]) }}"
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
                    @endforeach
                </div>
            </div>

        @endif
    </div>

    @include('_globals.home._footer', ['rel' => false])
    @push('javascript')
        <script>
            var elem = document.querySelector('.grid-content');
            var msnry = new Masonry(elem, {
                // options
                itemSelector: '.evento',
                //columnWidth: '33%'
                percentPosition: true,

            });

        </script>
    @endpush
@endsection
