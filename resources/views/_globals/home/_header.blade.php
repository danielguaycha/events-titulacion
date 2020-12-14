@include('auth.verify-notify')

<header>
    <!-- Menu desktop-->
    <nav class="container menu-main">
        <div class="logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/ei-logo.webp') }}" alt="Imagen de Logo Escuela informática">
                <h1>Escuela Informática</h1>
            </a>
        </div>
        <button class="menu-toggle" id="btn-menu" title="Abrir menú">
            <i class="fi fi-menu"></i>
        </button>
        <div class="menu-list">
            <ul>
                @auth

                    <li class="menu-profile">
                        <div class="submenu" id="submenu">
                            <img
                                src="{{ Avatar::create(Auth::user()->person->name . ' ' . Auth::user()->person->surname) }}"
                                alt="Imagen de Avatar">
                            <ul>
                                @can('events.*')
                                    <li><a href="{{ route('events.index') }}">Administrar</a></li>
                                @endcan
                                <li>
                                    <a href="{{ route('user.profile') }}">Perfil</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.password') }}">Cambiar contraseña</a>
                                </li>
                                <li>


                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="btn-cursos">
                        <a class="menu-item dark" href="{{ route('cursos') }}">
                            <i class="fi fi-birrete"></i>
                            Eventos @if (isset($countEvent))
                                <span class="count">{{ $countEvent }}</span>
                            @endif
                        </a>
                    </li>
                @endauth
                @guest
                    <li class="btn-cursos">
                        <a class="menu-item dark" href="{{ route('login') }}">
                            <i class="fi fi-candado"></i>
                            Iniciar sesión
                        </a>
                    </li>
                @endguest
                <li><a class="menu-item" href="{{ $rel ? '#carreras' : url('/#carreras') }}">Carreras</a></li>
                <li><a class="menu-item" href="{{ $rel ? '#areas' : url('/#areas') }}">Áreas de estudio</a></li>
                <li><a class="menu-item" href="{{ $rel ? '#acerca-de' : url('/#acerca-de') }}">Acerca de</a></li>
                <li><a class="menu-item" href="{{ $rel ? '#contacto' : url('/#contacto') }}">Contacto</a></li>

            </ul>
        </div>
    </nav>
</header>
<!-- Menu responsive-->
<aside class="menu-main-movil">
    <button id="btn-close" aria-label="Cerrar menu"><i class="fi fi-cancelar"></i></button>
    <ul class="menu-list-movil"></ul>
</aside>

<div class="overlay"></div>

