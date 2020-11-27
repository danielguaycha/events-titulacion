@extends('layouts.index')
@section('content')
    @include('_globals.home._header', ['rel' => true])
    <!-- Slider --->
    <section class="slider-area" id="inicio">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url({{ asset('img/home/slider-1.jpg') }});"></div>
                <div class="swiper-slide" style="background-image: url({{ asset('img/home/slider-3.jpg') }});"></div>
            </div>
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

        </div>
    </section>

    <!-- Carreras -->
    <section class="carreras-area" id="carreras"
             style="background-image: url({{ asset('img/home/ei-logo-gray.png') }})">
        <div class="section-title">
            <h3>Carreras</h3>
            <span class="divider">
                    <i class="fi fi-birrete"></i>
                </span>
        </div>
        <div class="container">
            <div class="carreras-area-body row">
                <div class="col-sm-12 col-md-6 carrera-content">
                    <div class="ei-carrera">
                        <div class="ei-carrera-header">
                            <i class="fi fi-software"></i>
                            <!-- <a href="#" class="ei-btn rounded secondary-outline sm">Ver más</a> -->
                        </div>
                        <h4>TECNOLOGÍAS DE LA INFORMACIÓN</h4>
                        <p>
                            La carrera de Tecnologías de la Información forma profesionales capacitados para la gestión
                            de la infraestructura tecnológica y sistemas de información, siendo este aspecto un eje
                            transversal en todos los sectores del país y áreas de interés público. Todas las
                            organizaciones requieren de profesionales con formación tecnológica para el tratamiento de
                            su información y gestión procesos.
                        </p>

                    </div>
                </div>
                <div class="col-sm-12 col-md-6 carrera-content">
                    <div class="ei-carrera">
                        <div class="ei-carrera-header">
                            <i class="fi fi-programacion"></i>
                            <!-- <a href="#" class="ei-btn rounded secondary-outline sm">Ver más</a> -->
                        </div>
                        <h4>INGENIERÍA EN SISTEMAS</h4>
                        <p>
                            La carrera de Ingeniería en sistemas forma profesionales con capacidades científicas,
                            técnicas, tecnológicas y humanistas mediante la docencia e investigación formativa para que
                            sean competitivos y comprometidos con el desarrollo sostenible y sustentable del buen vivir.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--- Areas de estudio -->
    <section class="areas-estudio" id="areas">
        <div class="container">
            <div class="section-title dark">
                <h3>Áreas de estudio</h3>
                <span class="divider">
                        <i class="fi fi-birrete"></i>
                    </span>
                <p>Estas son algunas de las áreas que forman parte de nuestro curriculum académico en la Escuela de
                    informática</p>
            </div>
            <div class="topic-content">
                <div class="topics">
                    <!--Electrónica-->
                    <div data-aos="flip-up" class="topic topic-icon bg-green"><i class="fi fi-circuito"></i></div>
                    <div data-aos="flip-up" class="topic topic-text">Electrónica</div>
                    <!-- Desarrollo de sotfware -->
                    <div data-aos="flip-up" class="topic topic-icon bg-orange"><i class="fi fi-sitio-web"></i></div>
                    <div data-aos="flip-up" class="topic topic-text">Desarrollo de software</div>
                    <!-- Bases de datos -->
                    <div data-aos="flip-up" class="topic topic-icon bg-blue"><i class="fi fi-servidor"></i></div>
                    <div data-aos="flip-up" class="topic topic-text">Bases de datos</div>
                    <!-- Sistemas operativos--->
                    <div data-aos="flip-up" class="topic topic-text">Sistemas Operativos</div>
                    <div data-aos="flip-up" class="topic topic-icon bg-cyan"><i class="fi fi-servidor-1"></i></div>
                    <!-- Redes de datos -->
                    <div data-aos="flip-up" class="topic topic-text">Redes de datos</div>
                    <div data-aos="flip-up" class="topic topic-icon bg-purple"><i class="fi fi-nube-1"></i></div>
                    <!-- Ing. de software -->
                    <div data-aos="flip-up" class="topic topic-text">Ingeniería de software</div>
                    <div data-aos="flip-up" class="topic topic-icon bg-red"><i class="fi fi-redes-1"></i></div>
                </div>
            </div>
        </div>
    </section>

    <section class="acerca-de" id="acerca-de">
        <div class="container">
            <div class="section-title">
                <h3>Acerca de Nosotros</h3>
                <span class="divider">
                        <i class="fi fi-birrete"></i>
                    </span>
                <p>La Escuela de Informática forma parte de la Facultad de Ingeniería Civil en la prestigiosa
                    Universidad Técnica de Machala</p>
            </div>
            <!--Mision-->
            <div class="row ei-info-content">
                <div class="col-md-6 ei-info" data-aos="fade-right">
                    <h4 class="ei-info-title">MISIÓN</h4>
                    <div class="ei-info-cita">
                        <i class="fi fi-cita"></i>
                        <p>
                            Formar profesionales emprendedores con capacidades científico-técnicas y humanísticas, que
                            gestionen eficientemente la información, desarrollando soluciones tecnológicas con
                            principios de ingeniería y estándares de calidad, comprometidos con el desarrollo
                            socioeconómico de la población en su área de influencia.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 ei-info-img">
                    <img src="{{ asset('img/home/mision.png') }}" data-aos="fade-left" alt="Misión">
                </div>
            </div>
            <!--Vision-->
            <div class="row ei-info-content">
                <div class="col-md-6 ei-info-img">
                    <img src="{{ asset('img/home/vision.png') }}" data-aos="fade-right" alt="Visión">
                </div>
                <div class="col-md-6 ei-info" data-aos="fade-right">
                    <h4 class="ei-info-title">VISIÓN</h4>
                    <div class="ei-info-cita">
                        <i class="fi fi-cita"></i>
                        <p>
                            Ser líder regional y nacional en la formación de profesionales de Tecnologías de la
                            Información, y reconocida por su excelencia académica e investigación.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="gallery">
        <div class="grid-gallery">
            @for ($i = 1; $i <= 8; $i++)
                <div class="grid-item" data-aos="flip-up"
                     style="background-image: url({{ asset('img/home/'.$i.'.jpg') }})">
                    <a href="{{ asset('img/home/'.$i.'.jpg') }}" data-fancybox="gallery" data-caption=""></a>
                </div>
            @endfor
        </div>
    </section>

    <section class="contact" id="contacto">
        <div class="section-title">
            <h3>Contacto</h3>
            <span class="divider">
                    <i class="fi fi-birrete"></i>
                </span>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 ei-info-img" data-aos="flip-down">
                    <img src="{{ asset('img/home/contacto.png') }}" alt="Contacto">
                    <div class="ei-info-text">
                        <div class="ei-info-icon">
                            <i class="fi fi-marcador-de-posicion"></i>
                            <span>Vía Machala-Pasaje Km 5 1/2  Universidad Técnica de Machala</span>
                        </div>

                        <div class="ei-info-icon">
                            <i class="fi fi-sobre"></i>
                            <a href="mailto:info@mail.com">info@mail.com</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center" data-aos="flip-down">
                    <form action="{{ route('contact') }}" method="post">
                        @csrf
                        <input type="text" placeholder="Nombre" name="name"
                               value="{{ old('name') }}"
                               class="ei-form" required maxlength="75"/>
                        <input type="email" placeholder="Correo" name="email"
                               value="{{ old('email') }}"
                               class="ei-form" required/>
                        <input type="text" placeholder="Asunto" name="topic"
                               value="{{ old('topic') }}"
                               class="ei-form" required maxlength="100"/>
                        <textarea rows="3" placeholder="Mensaje"
                                  class="ei-form" required name="message"
                                  maxlength="150">{{ old('message') }}</textarea>
                        <button type="submit" class="ei-btn secondary rounded">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <button id="btn-up" onclick="gotoTop()"><i class="fi fi-flecha-hacia-arriba"></i></button>

    @include('_globals.home._footer', ['rel' => true])


@endsection
