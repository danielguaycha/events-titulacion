<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="description" content="Sitio web de la Escuela informática, Universidad Técnica de Machala">
    <title>Home | Escuela informática</title>
    @include('_globals._meta_icon_head')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=1.0.1">
    @stack('styles')
</head>

<body>

<div class="content" id="inicio">


    @yield('content')


</div>

<!---scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('plugins/gallery.js') }}"></script>
<script src="{{ asset('js/home.js') }}?v=1.0.1"></script>
@stack('javascript')
</body>

</html>
