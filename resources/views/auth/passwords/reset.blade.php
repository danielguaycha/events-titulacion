@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="login-content">
            <div class="login">

                <b>{{ __('Reset Password') }}</b>
                <form method="POST" class="login-body" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="ei-group @error('email') err @enderror">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="ei-form"
                               name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"
                               autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror

                    </div>

                    <div class="ei-group @error('password') err @enderror">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password"
                               class="ei-form" name="password"
                               required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                        @enderror
                    </div>

                    <div class="ei-group">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="ei-form"
                               name="password_confirmation" required autocomplete="new-password">
                    </div>


                    <button type="submit" class="ei-btn primary rounded">
                        {{ __('Reset Password') }}
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection
