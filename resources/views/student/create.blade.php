@extends('layouts.admin')
@push('nav')
    @include('notify-min')
@endpush
@section('content')
    <form class="card" method="post" action="{{ route('students.store') }}">
        @csrf
        <div class="card-header">
            <b><i class="fa fa-users-cog"></i> Nuevo estudiante</b>
        </div>
        <div class="card-body">  {{--form--}}
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="card-body-title">Datos básicos</div>
                    <div class="form-group">
                        <label for="dni">Cedula: </label>
                        <input type="text"
                               autofocus="autofocus"
                               required
                               value="{{ old('dni') }}"
                               class="form-control" name="dni" id="dni" placeholder="Ingrese cedula">
                    </div>
                    <div class="form-group">
                        <label for="surname">Apellidos: </label>
                        <input type="text"
                               required
                               value="{{ old('surname') }}"
                               class="form-control" name="surname" id="surname" placeholder="Ingrese apellidos">
                    </div>

                    <div class="form-group">
                        <label for="name">Nombres: </label>
                        <input type="text"
                               required
                               value="{{ old('name') }}"
                               class="form-control" name="name" id="name" placeholder="Ingrese nombres">
                    </div>

                    <div class="form-group">
                        <label for="type">Tipo: </label>
                        <select class="form-control" name="type" id="type">
                            <option value="" disabled>Seleccione...</option>
                            <option value="student" @if(old('type') === 'student' ) selected @endif>Estudiante</option>
                            <option value="particular" @if(old('type') === 'particular' ) selected @endif>Particular</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="card-body-title">Credenciales</div>
                    <div class="form-group">
                        <label for="email">Email: </label>
                        <input type="email"
                               required
                               value="{{ old('email') }}"
                               class="form-control" name="email" id="email" placeholder="Ingrese un correo">
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <div class="row">
                            <div class="col flex-grow-1">
                                <input type="text"
                                       required
                                       class="form-control" name="password" id="password" aria-describedby="helpPw" placeholder="Ingrese contraseña">
                            </div>
                            <div class="col flex-grow-0">
                                <button type="button"
                                        data-toggle="tooltip"
                                        data-placement="left"
                                        title="Generar nueva contraseña"
                                        onclick="getPw()" class="btn btn-secondary"><i class="fa fa-redo-alt"></i></button>
                            </div>
                        </div>
                        <small id="helpPw" class="form-text text-muted">Debe incluir mínimo 8 caracteres, entre ellos signo, números mayúsculas, minúsculas</small>
                    </div>
                    <div class="form-check mt-2">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="sendEmail" id="sendEmail" @if (old('sendEmail')) checked @endif >
                            Enviar contraseña al correo
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Crear estudiante</button>
        </div>
    </form>
@endsection

@section('js')
    <script>
        window.onload = function () {
            getPw()
        }
        function getPw() {
            document.getElementById('password').value = generatePassword(15);
        }
    </script>
@endsection
