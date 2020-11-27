@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="login-content">


            <div class="login-head">
                <h3>Crear Cuenta</h3>
            </div>

            <div class="login">
                <form method="POST" class="login-body" action="{{ route('register') }}">
                    @csrf

                    <div class="ei-group @error('dni') err @enderror">
                        <label for="dni">Cedula: </label>
                        <input id="dni"
                               type="text"
                               class="ei-form" name="dni"
                               value="{{ old('dni') }}" required autocomplete="dni" minlength="10"
                               maxlength="10" autofocus>
                        @error('dni')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="ei-group @error('surname') err @enderror">
                        <label for="surname">Apellidos: </label>
                        <input id="surname" type="text" class="ei-form"
                               minlength="3" maxlength="90"
                               name="surname" value="{{ old('surname') }}" required autocomplete="surname">
                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                        @enderror
                    </div>

                    <div class="ei-group @error('name') err @enderror">
                        <label for="name">Nombres: </label>

                        <input id="name" type="text" class="ei-form"
                               name="name" value="{{ old('name') }}"
                               minlength="3" maxlength="90"
                               required autocomplete="name">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                        @enderror

                    </div>

                    <div class="ei-group @error('email') err @enderror">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="ei-form"
                               name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="ei-group ei-form-full @error('password') err @enderror">
                        <label for="password">{{ __('Password') }}: </label>

                        <input id="password" type="password"
                               class="ei-form ei-password" name="password" required
                               autocomplete="new-password">
                        <small class="text-muted">Incluye números, letras (minúsculas, mayúsculas) y un signo</small>
                        <button type="button" class="show-password">
                            <i class="fi fi-ver"></i>
                        </button>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="radio-group">

                        <label class="ei-radio">
                            <input class="radio @error('role') err @enderror" required
                                   @if(old('role') === 'student') checked @endif
                                   type="radio" name="role" id="role_student" value="student">
                            Estudiante
                        </label>


                        <label class="ei-radio">
                            <input class="radio @error('role') is-invalid @enderror" required
                                   @if(old('role') === 'particular') checked @endif
                                   type="radio" name="role" id="role_particular" value="particular">
                            Particular
                        </label>

                        @error('role')
                        <span class="invalid-feedback" role="alert">
                               {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="ei-btn primary rounded">
                        Registrarme
                    </button>

                    <span class="divider">o</span>
                    <small class="text-primary">¿Ya tienes una cuenta?</small>

                    <div class="btn-register mb-0">
                        <a href="{{ route('login') }}">
                            <i class="fi fi-candado"></i> Inicia sesión
                        </a>
                    </div>
                </form>
                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fi fi-casa"></i>Ir a inicio
                </a>
            </div>
            <small class="copyright">© {{ Date('Y') }} ESCUELA INFORMÁTICA</small>

        </div>
    </div>
@endsection
