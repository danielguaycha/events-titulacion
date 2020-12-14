<footer>
    <div class="footer-content container">
        <div class="footer-img footer-ei">
            <img src="{{ asset('img/ei-logo.webp') }}" alt="Imágen de Escuela informática">
            <b>ESCUELA INFORMÁTICA</b>
            <p>“Si lo puedes imaginar lo puedes realizar”</p>
            <div class="social">
                <a href="{{ route('login') }}" rel="nofollow" aria-label="Configuraciones"><i class="fi fi-configuraciones"></i></a>
                <a href="mailto:{{ env('MAIL_CONTACT', 'support@dguaycha.com') }}" aria-label="Enviar email"><i class="fi fi-sobre"></i></a>
                <a href="https://www.facebook.com/mir.sistemas" rel="nofollow" target="_blank" aria-label="Ingresar a Facebook"><i
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
                <li><a href="http://utmachala.edu.ec/" rel="nofollow" target="_blank">UTMachala</a></li>
                <li><a href="http://utmachala.edu.ec/siutmach/public/" rel="nofollow" target="_blank">Siutmach</a></li>
                <li><a href="http://titulacion.utmachala.edu.ec/" rel="nofollow" target="_blank">Titulación UTMACH</a>
                </li>
                <li><a href="http://repositorio.utmachala.edu.ec/" rel="nofollow" target="_blank">Repositorio
                        universitario</a>
                </li>
            </ul>
        </div>
        <div class="footer-img footer-utmach">
            <img src="{{ asset('img/utm-logo.webp') }}" alt="Imágen de Utmach Logo">
            <p>La Escuela informática forma parte de la UTMACH, una institución de educación superior orientada a la
                docencia, a la investigación y a la vinculación con la sociedad.</p>
        </div>
    </div>
    <div class="footer-credits">
        <div class="container">
            <div>
                © Copyright {{ date('Y') }} by <a target="_blank" rel="nofollow" href="https://dguaycha.com">dguaycha.com</a>
            </div>
            <div>
                Informáticos de corazón <b class="cora">❤</b>
            </div>
        </div>
    </div>
</footer>
