@extends('layouts.index')

@section('content')
    @include('_globals.home._header', ['rel' => false])
    <div class="container evento-container">

        <div class="ei-verify">
            <div class="title">
                <h3>Verifique su email para finalizar</h3>
            </div>
            @if (session('resent'))
            @endif

            <p>Tu proceso de registro esta en curso</p>
            {{ __('Before proceeding, please check your email for a verification link.') }}
            Si no has recibido el email, usa el botón reenviar.
            <div class="footer">
                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <br>
                    <button type="submit"
                            class="ei-btn primary rounded">Reenviar Email
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('_globals.home._footer', ['rel' => false])
@endsection
