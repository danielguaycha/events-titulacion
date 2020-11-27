<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('_globals._meta_icon_head')

    <title>{{ config('app.name', 'EI-Event') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body>
@yield('content')
<script>
    const pw = document.querySelector('.show-password');
    if (pw)
        pw.addEventListener('click', function () {
            let x = document.querySelector('.ei-password');
            if (x.type === "password") {
                x.type = "text";
                this.classList.add('active');
                x.focus();
            } else {
                x.type = "password";
                this.classList.remove('active');
                x.focus();
            }
        });
</script>
</body>
</html>
