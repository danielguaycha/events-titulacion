@extends('layouts.app')

@section('content')

    <div class="content">

        <div class="login-content">

            <div class="login">
                <div class="card-header">
                    <b class="text-primary">
                        RESTABLECER CONTRASEÑA
                    </b>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" class="login-body" action="{{ route('password.email') }}">
                        @csrf

                        <div class="ei-group @error('email') err @enderror">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>


                            <input id="email" type="email" class="ei-form "
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                      {{ $message }}
                                    </span>
                            @enderror
                        </div>

                        <div class="">
                            <button type="submit" class="ei-btn primary rounded">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>

                        <br>

                        <div class="mt-2">
                            <a href="{{ route('login') }}" class="btn-home">
                                <i class="fi fi-candado"></i>Iniciar sesión
                            </a>
                            <a href="{{ url('/') }}" class="btn-home">
                                <i class="fi fi-casa"></i>Ir a inicio
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
