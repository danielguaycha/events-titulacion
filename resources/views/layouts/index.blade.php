<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sitio web de la Escuela informática, Universidad Técnica de Machala provee información acerca de las carreras, áreas de estudio, contacto, la misión y visión"/>
    <meta name=”robots” content="index, follow">
    <meta name=”googlebot” content="index, follow">
    <meta name="keywords" content="escuela  uela informática, utmach,tecnologias de la información, universidad técnica de machala"/>
    <title>Escuela informática</title>
    <link rel= "canonical" href="{{ url('/') }}"/>
    @include('_globals._meta_icon_head')
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}?v=1.0.3">
    @stack('styles')
</head>

<body>

<main class="content" id="inicio">


    @yield('content')


</main>

<!---scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{{ asset('plugins/gallery.js') }}"></script>
<script src="{{ asset('js/home.js') }}?v=1.0.1"></script>
@stack('javascript')
</body>

</html>
