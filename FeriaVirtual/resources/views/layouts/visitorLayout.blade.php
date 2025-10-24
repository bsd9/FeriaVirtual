<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fair360 | Feria Virtual</title>



    <!-- Icono de la página -->

    <link rel="icon" href="{{ asset('img/welcome/logoFair360.png') }}" type="image/png">



    <!-- Fuentes -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">



    <!-- Iconos -->

    <link rel="stylesheet" href="{{asset('admin_visitors/plugins/fontawesome-free/css/all.min.css')}}">



    <!-- Estilos CSS -->

    <link rel="stylesheet" href="{{asset('admin_visitors/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin_visitors/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">



    <!-- Reproductor de audio -->

    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.8/plyr.css">



    <!-- Meta etiquetas -->

    <meta name="description" content="¡Bienvenido a Fair360! Descubre la feria virtual con una amplia variedad de expositores, conferencias y más. Regístrate ahora.">



    <!-- Meta tags para redes sociales -->

    <meta property="og:title" content="Fair360 | Feria Virtual">

    <meta property="og:description" content="¡Bienvenido a Fair360! Descubre la feria virtual con una amplia variedad de expositores, conferencias y más. Regístrate ahora.">

    <meta property="og:image" content="{{ asset('img/og-image.jpg') }}">

    <meta name="twitter:card" content="summary_large_image">

    <meta name="twitter:title" content="Fair360 | Feria Virtual">

    <meta name="twitter:description" content="¡Bienvenido a Fair360! Descubre la feria virtual con una amplia variedad de expositores, conferencias y más. Regístrate ahora.">

    <meta name="twitter:image" content="{{ asset('img/og-image.jpg') }}">



</head>

<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">
    
<div class="wrapper">

        <div class="tab-content">

            <div class="tab-pane fade show active" id="panel-http-feriavirtual-test-feriafair360" role="tabpanel"

                 aria-labelledby="tab-http-feriavirtual-test-feriafair360">

                <iframe src="http://feriavirtual.test/feriafair360" style="height: 870px;"></iframe>

            </div>

            <div class="tab-loading" style="height: 868px; display: none;">

                <div>

                    <h2 class="display-4">Cargando...<i class="fa fa-sync fa-spin"></i></h2>

                </div>

            </div>

            <div class="tab-pane fade" id="panel-http-feriavirtual-test-feriafair360" role="tabpanel"

                 aria-labelledby="tab-http-feriavirtual-test-feriafair360">

                <iframe src="http://feriavirtual.test/feriafair360" style="height: 870px;"></iframe>

            </div>

        </div>

    </div>

    <!-- /.content-wrapper -->

</div>

<!-- ./wrapper -->



<!-- jQuery -->

<script src="{{asset('admin_visitors/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->

<script src="{{asset('admin_visitors/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script>

    $.widget.bridge('uibutton', $.ui.button)

</script>

<!-- Bootstrap 4 -->

<script src="{{asset('admin_visitors/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- overlayScrollbars -->

<script src="{{asset('admin_visitors/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>

<!-- AdminLTE App -->

<script src="{{asset('admin_visitors/dist/js/adminlte.js')}}"></script>

<!-- AdminLTE for demo purposes -->

{{--<script src="{{asset('admin_visitors/dist/js/demo.js')}}"></script>--}}

<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }
    .wrapper {
        height: 100%;
    }
    .tab-content {
        height: 100%;
    }
    .tab-content iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

<script>



    $(document).ready(function(){

        $('[data-toggle="tooltip"]').tooltip();

    });

</script>

</body>

</html>

