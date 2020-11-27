@extends('layouts.index')

@section('content')
    @include('_globals.home._header', ['rel' => false])
    <div class="content evento-container center">
        <div class="ei-verify">
            <div class="title-center">
                <b>Cambiar Clave</b>
            </div>
            <form method="post" action="{{ route('user.update_password') }}">
                @csrf
                @method('put')


                <div class="ei-group">
                    <label for="password_now">Contraseña Actual</label>
                    <input type="password"
                           class="ei-form" name="password_now" id="password_now" required>
                </div>

                <div class="ei-group">
                    <label for="password">Contraseña Nueva</label>
                    <input type="password" minlength="8"
                           class="ei-form" name="password" id="password" required>
                </div>

                <div class="ei-group">
                    <label for="password_confirmation">Repite contraseña</label>
                    <input type="password" class="ei-form"
                           minlength="8"
                           name="password_confirmation" id="password_confirmation"
                           required>
                </div>
                <div class="footer">
                    <button type="submit" class="ei-btn success rounded">Cambiar clave</button>
                </div>

            </form>
        </div>
    </div>
    @include('_globals.home._footer', ['rel' => false])
@stop
