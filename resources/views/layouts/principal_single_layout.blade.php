<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Feria virtual | Fair360</title>
    <meta name="description" content="¡Bienvenido a la feria virtual de Fair360! Descubre una experiencia única con expositores, conferencias y más. Regístrate ahora.">

    <!-- Icono de la página -->
    <link rel="icon" href="{{ asset('img/welcome/logoFair360.png') }}">

    <!-- Escalabilidad de la página -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Estilos CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.7/hammer.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="js/splide.js?v=25057" type="text/javascript"></script>
    <script src="js/splide-extension-auto-scroll.js?v=25057" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

    <!-- Meta tags para redes sociales -->
    <meta property="og:title" content="Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más">
    <meta property="og:description" content="¡Bienvenido a la feria virtual de Fair360! Descubre una experiencia única con expositores, conferencias y más. Regístrate ahora.">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más">
    <meta name="twitter:description" content="¡Bienvenido a la feria virtual de Fair360! Descubre una experiencia única con expositores, conferencias y más. Regístrate ahora.">
    <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,300;0,400;0,500;0,700;1,300&amp;display=swap" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Coloca cualquier otro script o enlace necesario -->

</head>

<body>
  <header class="header--private">
    <div class="header__primary">
      <div class="header__wrap">
        <div class="header__flex">
          <div class="header__partners"><a href="{{route('principal')}}"><img src="{{ asset('img/principal/log.png') }}" title="logo fair360" alt="Feria virtual - fair 360"></a></div>
        </div>
      </div>
    </div>
    <div class="header__secondary">
      <div class="header__wrap">
        <div class="header__inner">
          <div class="header__logo"><a href="{{route('principal')}}"><img src="{{ asset('img/principal/LogoBlanco.png') }} " title="logo fair360" alt="Feria virtual - fair 360"></a>
          </div>
          <div class="header__nav">
            <div class="header__nav__bg"></div>
            <div class="header__nav__nav">
              <div class="header__nav__close">
                <div></div>
                <div></div>
              </div>
              <div class="header__nav__back">
                <div></div>
                <div></div>
                <div></div>
              </div>
              <nav>
                <ul>
                  <li><a href="{{ route('facade') }}">Inicio</a></li>
                  <li><a href="{{ route('stands.show')}}">Stands</a></li>
                  <li><a href="{{ route('movie.show')}}">Señal en vivo</a></li>
                </ul>
              </nav>
            </div>
          </div>
          <div class="header__right">
            <div class="header__item header__item--ham">
              <div class="header__ham"><span></span><span></span><span></span></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  @yield('content')
  <footer>
    <div class="footer__wrap">
      <div class="footer__flex">
        <div class="footer__logo"> <img src="{{ asset('img/principal/log.png') }}" title="logo fair360" alt="Feria virtual - fair 360"></div>
        <div class="footer__text"> <span>Para mayor información o consulta escribenos a <a
              href="#">fair@gmial.com</a></span></div>
        <div class="footer__socials">
          <div class="footer__social"> <a href="#"><span class="fab fa-facebook"></span></a></div>
          <div class="footer__social"> <a href="#"><span class="fab fa-instagram"></span></a></div>
          <div class="footer__social"> <a href="#"><span class="fab fa-twitter"></span></a></div>
          <div class="footer__social"> <a href="#"><span class="fab fa-youtube"></span></a></div>
        </div>
        <div class="footer__icon"><img src="{{ asset('img/principal/LogoBlanco.png') }}" title="logo fair360" alt="Feria virtual - fair 360"></div>
      </div>
    </div>
  </footer>
</body>

</html>
