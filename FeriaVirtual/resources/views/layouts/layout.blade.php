<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Feria Virtual - Fair360</title>
    <meta name="description" content="¡Bienvenido a la Feria Virtual de Fair360! Explora una amplia variedad de expositores, eventos y oportunidades de networking. ¡Únete a nosotros y descubre todo lo que nuestra feria tiene para ofrecer!">
    <link rel="icon" href="{{ asset('img/welcome/logoFair360.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.16.0/font/bootstrap-icons.css">



    @yield('styles')
    @notifyCss
    @livewireStyles
    <style>
        .swiper-container {
            max-width: 850px;
            /* Define el ancho deseado */
            margin: 0 auto;
            /* Centra el carrusel horizontalmente */
        }

        .swiper-slide img {
            max-width: 100%;
            /* Ajusta el tamaño máximo de las imágenes al 100% del contenedor */
            height: auto;
            /* Mantiene la proporción original de las imágenes */
        }

        /* Estilos para los botones flotantes */
        .floating-buttons {
            position: absolute;
            bottom: 20px;
            right: 20px;
        }

        .floating-buttons .container {

            border-radius: 8px;
            /* Borde redondeado */
            padding: 10px;
        }

        .floating-buttons .col-2 {
            margin-right: 10px;
            /* Ajusta el margen entre los botones */
        }
    </style>
</head>
<header>
{{--    @include('nav')--}}
</header>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>

   @include('notify::components.notify')

{{--    <!-- @include('footer') -->--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    @stack('scripts')
    @livewireScripts
    @notifyJs
    <script>
        window.onload = checkScreenSize;
        window.addEventListener('resize', checkScreenSize);

        $(document).ready(function () {
            $('#view').on('shown.bs.modal', function () {
                // Selecciona el iframe y reproduce el video
                var iframe = document.querySelector('#videoIframe');
                iframe.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
            });

            $('#view').on('hidden.bs.modal', function () {
                // Selecciona el iframe y pausa el video
                var iframe = document.querySelector('#videoIframe');
                iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
            });
        });

        function checkScreenSize() {
            if (window.matchMedia("(max-width: 768px)").matches) {
                alert("Por favor, gire su dispositivo para una mejor experiencia.");
            }
        }

    </script>

    @bukScripts(true)

</body>

</html>
