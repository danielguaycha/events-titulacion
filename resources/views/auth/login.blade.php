@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="login-content">
            <div class="login">
                <div class="login-head">
                    <img src="{{ asset('img/ei-logo.webp') }}" class="logo" alt="Logo EI">
                </div>
                <form method="POST" class="login-body" action="{{ route('login') }}">
                    @csrf
                    <div class="ei-group @error('email') err @enderror">
                        <label for="email">Correo: </label>
                        <input id="email" type="email"
                               class="ei-form"
                               name="email" value="{{ old('email') }}" required
                               autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="ei-form-full ei-group @error('password') err @enderror">
                        <label for="password">Contraseña: </label>
                        <input id="password" type="password"
                               class="ei-form ei-password"
                               name="password" required
                               autocomplete="current-password">
                        <button type="button" class="show-password">
                            <i class="fi fi-ver"></i>
                        </button>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>


                    <label class="ei-checkbox" for="remember">
                        <input class="checkbox" type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Recordar mi sesión
                    </label>


                    <button type="submit" class="ei-btn primary rounded">
                        Iniciar sesión
                    </button>

                    <span class="divider">o</span>
                    <div class="btn-register">
                        <a href="{{ route('register') }}" type="button">
                            <i class="fi fi-avatar"></i> Registrarme
                        </a>
                    </div>
                </form>


                @if (Route::has('password.request'))
                    <a class="text-muted" href="{{ route('password.request') }}">
                        ¿Olvidaste tu contraseña?
                    </a>
                @endif

                <a href="{{ url('/') }}" class="btn-home">
                    <i class="fi fi-casa"></i>Ir a inicio
                </a>
            </div>
            <small class="copyright">© {{ Date('Y') }} ESCUELA INFORMÁTICA</small>
        </div>
    </div>
@endsection
