@extends('layouts.index')

@section('content')
    @include('_globals.home._header', ['rel' => false])
    <div class="content evento-container center">
        <div class="ei-verify">
            <div class="title-center">
                <b>Modificar perfil</b>
            </div>
            <form action="{{ route('user.update') }}" method="post">
                @csrf @method('put')

                <div class="ei-group">
                    <label for="name">Nombre: </label>
                    <input type="text"
                           required value="{{ old('name', $user->person->name) }}"
                           class="ei-form" name="name" id="name" placeholder="Ingrese nombre">
                </div>
                <div class="ei-group">
                    <label for="surname">Apellido: </label>
                    <input type="text" required
                           value="{{ old('surname', $user->person->surname) }}"
                           class="ei-form" name="surname" id="surname" placeholder="Ingrese apellido">
                </div>

                <div class="ei-group">
                    <label for="email">Email: </label>
                    <input type="text" required
                           value="{{ old('email', $user->email) }}"
                           class="ei-form" name="email" id="email" placeholder="Ingrese correo">
                </div>

                <div class="footer">
                    <a href="{{ route('user.password') }}" class="ei-btn primary-outline rounded">Cambiar clave</a>
                    &nbsp;&nbsp;
                    <button type="submit" class="ei-btn success rounded">Actualizar datos
                    </button>
                </div>
            </form>
        </div>
    </div>
    @include('_globals.home._footer', ['rel' => false])
@stop
