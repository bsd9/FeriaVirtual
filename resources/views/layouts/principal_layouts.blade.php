<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Feria virtual | Fair360</title>
    <meta name="description" content="Bienvenido a la feria virtual de Fair360. Descubre una experiencia única con expositores, conferencias y más. ¡Regístrate ahora!">

    <!-- Agrega más metaetiquetas según sea necesario para SEO -->

    <link rel="icon" href="{{ asset('img/welcome/logoFair360.png') }}">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.7/hammer.min.js" type="text/javascript"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="{{ asset('js/main.js') }}" type="text/javascript"></script>

    <!-- Meta tags para redes sociales -->
    <meta property="og:title" content="Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más">
    <meta property="og:description" content="Bienvenido a la feria virtual de Fair360. Descubre una experiencia única con expositores, conferencias y más. ¡Regístrate ahora!">
    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más">
    <meta name="twitter:description" content="Bienvenido a la feria virtual de Fair360. Descubre una experiencia única con expositores, conferencias y más. ¡Regístrate ahora!">
    <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}">

    <!-- Incluir fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,300;0,400;0,500;0,700;1,300&amp;display=swap" rel="stylesheet">

    <!-- Incluir iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-<HASH>" crossorigin="anonymous" />

    <!-- Incluir scripts necesarios -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LdzxDkpAAAAAIjJvkpjg8Etnzze6irpPP8A8gNz"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Incluir estilos de Livewire si es necesario -->
    @stack('css')

    <!-- Incluir estilos de Livewire si es necesario -->
    @livewireStyles
</head>

<body>
  @include('header')

  @yield('content')
  <footer>
    <div parallax="-0.07,0" class="footer__house"><img src="{{ asset('img/logoBlanco.png') }}" title="logo fair360" alt="Feria virtual - fair 360"></div>
    <div class="footer__wrap">
      <div class="footer__flex">
        <div class="footer__logo"> <img src="{{asset('img/welcome/logoFair360.png')}}" title="fair 360" alt="Feria virtual - fair 360"></div>
        <div class="footer__text"> <span>Para mayor información o consulta escribenos a <a
              href="#">fenix@puntonet.com</a></span></div>
        <div class="footer__socials">
          <div class="footer__social"> <a href="{{$feria->facebook}}"><span class="fab fa-facebook"></span></a></div>
          <div class="footer__social"> <a href="{{$feria->instagram}}"><span class="fab fa-instagram"></span></a></div>
          <div class="footer__social"> <a href="{{$feria->whatsapp}}"><span class="fab fa-whatsapp"></span></a></div>
          {{-- <div class="footer__social"> <a href="{{$feria->instagram}}"><span class="fab fa-youtube"></span></a></div> --}}
        </div>
        <div class="footer__icon"><img src="{{ asset('img/principal/LogoBlanco.png') }}" title="logo fair360" alt="Feria virtual - fair 360"></div>
      </div>
    </div>
  </footer>

  @livewireScripts
  @stack('js')
  @yield('scripts')

  <script>
    document.addEventDefault('submit',function(e){
      e.preventDefault();
      grecaptcha.ready(function() {
          grecaptcha.execute('6LdzxDkpAAAAAIjJvkpjg8Etnzze6irpPP8A8gNz', {action: 'submit'}).then(function(token) {
             lef form = e.target;
             let input = document.createElement("token");
             input.type = 'hidden';
             input.name= "g_recaptcha_response";
             input.value = token;

             form.appendChild(input);
             form.submit();
          });
        });
    });
  </script>
</body>
</html>
