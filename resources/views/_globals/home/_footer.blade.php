<footer>
    <section class="footer-content container">
        <div class="footer-img footer-ei">
            <img src="{{ asset('img/ei-logo.webp') }}" alt="Logo Escuela informática">
            <b>ESCUELA INFORMÁTICA</b>
            <p>“Si lo puedes imaginar lo puedes realizar”</p>
            <div class="social">
                <a href="{{ route('login') }}"><i class="fi fi-configuraciones"></i></a>
                <a href="mailto:{{ env('MAIL_CONTACT', 'support@dguaycha.com') }}"><i class="fi fi-sobre"></i></a>
                <a href="https://www.facebook.com/mir.sistemas" rel="noopener" target="_blank"><i
                        class="fi fi-facebook"></i></a>
            </div>
        </div>
        <div class="enlaces">
            <div class="title">Enlaces de interés</div>
            <ul>
                <li><a href="{{ route('cursos') }}">Eventos</a></li>
                <li><a href="{{ $rel ? '#carreras' : url('/#carreras') }}">Carreras</a></li>
                <li><a href="{{ $rel ? '#areas' : url('/#areas') }}">Áreas de estudio</a></li>
                <li><a href="{{ $rel ? '#acerca-de' : url('/#acerca-de') }}">Acerca de nosotros</a></li>
                <li><a href="{{ $rel ? '#contacto' : url('/#contacto') }}">Contacto</a></li>
            </ul>
        </div>
        <div class="enlaces">
            <div class="title">Otros enlaces</div>
            <ul>
                <li><a href="http://utmachala.edu.ec/" rel="noopener" target="_blank">UTMachala</a></li>
                <li><a href="http://utmachala.edu.ec/siutmach/public/" rel="noopener" target="_blank">Siutmach</a></li>
                <li><a href="http://titulacion.utmachala.edu.ec/" rel="noopener" target="_blank">Titulación UTMACH</a>
                </li>
                <li><a href="http://repositorio.utmachala.edu.ec/" rel="noopener" target="_blank">Repositorio
                        universitario</a>
                </li>
            </ul>
        </div>
        <div class="footer-img footer-utmach">
            <img src="{{ asset('img/utm-logo.webp') }}" alt="Utmach Logo">
            <p>La Escuela informática forma parte de la UTMACH, una institución de educación superior orientada a la
                docencia, a la investigación y a la vinculación con la sociedad.</p>
        </div>
    </section>
    <section class="footer-credits">
        <div class="container">
            <div>
                © Copyright {{ date('Y') }} by <a target="_blank" rel="noopener" href="https://dguaycha.com">dguaycha.com</a>
            </div>
            <div>
                Informáticos de corazón <b class="cora">❤</b>
            </div>
        </div>
    </section>
</footer>
