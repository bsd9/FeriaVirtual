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

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('principal')}}" class="brand-link" title="Página principal">
            <img src="{{ asset('img/welcome/logoFair360.png') }}" title="logo fair360" alt="Feria virtual - fair 360"
                 class="brand-image img-circle elevation-3" style="opacity: .8;">
            <span class="brand-text font-weight-light">Fair360</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                <div class="image">
                    @if(auth('visitor')->user())
                        <img src="{{ asset('img/profile/' . auth('visitor')->user()->imagen) }}" title="logo fair360" alt="Feria virtual - fair 360"
                             class="brand-image img-circle elevation-3" style="opacity: .8; width: 40px; height: 40px;">
                    @else
                        <img src="{{ asset('img/welcome/logoFair360.png') }}" title="logo fair360" alt="Feria virtual - fair 360"
                             class="brand-image img-circle elevation-3" style="opacity: .8; width: 40px; height: 40px;">
                    @endif
                </div>
                <div class="info ml-2">
                    @auth('visitor')
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="{{ route('visitor.profile') }}" title="Página de perfil"
                                   class="nav-link">{{ auth('visitor')->user()->first_name }}</a>
                            </li>
                        </ul>
                    @else
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" title="Página de invitados">Invitado</a>
                            </li>
                        </ul>
                    @endauth
                </div>
            </div>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('feriafair360') }}" title="Página de fari360" class="nav-link">
                            <i class="nav-icon fas fa-running"></i>
                            <p>
                                Entrar a la feria
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Página de estantes">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Estantes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                @foreach(App\Models\Stand::active()->select('id', 'name')->get() as $stand)
                                    <a href="{{ route('standDetail', ['id' => $stand->id]) }}" title="Página de detalles de stands"
                                       class="nav-link d-flex align-items-center">
                                        <i>
                                            <img src="{{$stand->attachment()->first()->url()}}"
                                                 class="img-stand rounded-circle"
                                                 title="imagen de stand" alt="imagen-de-stand"
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        </i>
                                        <p class="ml-3">{{$stand->name}} sdsadad</p>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </li>
                    @auth('visitor')
                        <li class="nav-item">
                            <a href="#" title="Página de documentos" class="nav-link">
                                <i class="nav-icon fas fa-file-word"></i>
                                <p>
                                    Documentos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="ml-1 nav nav-treeview">
                                @foreach($events as $event)
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="far fa-file-pdf nav-icon"></i>
                                            <p>{{ $event->nombre }}</p>
                                            <i class="right fas fa-angle-left"></i>
                                        </a>
                                        <ul class="ml-1 nav nav-treeview">
                                            <li class="nav-item">
                                                <a href="{{ route('download.report', ['id' => $event->id]) }}" class="nav-link" target="_blank">
                                                    <i class="fas fa-certificate nav-icon"></i>
                                                    <p>Certificado</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="{{$event->documents_url}}?id={{ $event->id }}" class="nav-link" target="_blank">
                                                    <i class="fas fa-book nav-icon"></i>
                                                    <p>Memoria</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>

                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-check"></i>
                                <p>
                                    Usuario
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="ml-1 nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('visitor.profile') }}" class="nav-link" title="Página de perfil">
                                        <i class="far fa-user-circle nav-icon"></i>
                                        <p>Perfil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <form method="POST" action="{{ route('visitor.logout') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block">
                                            <div class="d-flex justify-content-center align-items-center">
                                                    <span>
                                                        <i class="fas fa-sign-out-alt nav-icon"></i>
                                                    </span>
                                                <span>Cerrar sesión</span>
                                            </div>
                                        </button>
                                    </form>
                                </li>
                            </ul>

                        </li>

                    @endauth
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750" style="height: 911px;">
        <div class="nav navbar navbar-expand navbar-white navbar-light border-bottom p-0">

            <div class="nav-item dropdown">
                <a class="nav-link bg-danger dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="true" aria-expanded="false">Close</a>
                <div class="dropdown-menu mt-0">
                    <a title="Cerrar pestaña" class="dropdown-item" href="#" data-widget="iframe-close" data-type="all">Close All</a>
                    <a title="Cerrar pestaña" class="dropdown-item" href="#" data-widget="iframe-close" data-type="all-other">Close All
                        Other</a>
                </div>
            </div>
            <a class="nav-link bg-light" href="#" title="Entrar a fair360" data-widget="iframe-scrollleft"><i
                    class="fas fa-angle-double-left"></i></a>
            <ul class="navbar-nav overflow-hidden" role="tablist">
                <li class="nav-item active" role="presentation"><a href="#" title="entrar a la feria" class="btn-iframe-close"
                                                                   data-widget="iframe-close" data-type="only-this"><i
                            class="fas fa-times"></i></a><a class="nav-link active" title="fair 360 iframe" data-toggle="row"
                                                            id="tab-http-feriavirtual-test-feriafair360"
                                                            href="#panel-http-feriavirtual-test-feriafair360" role="tab"
                                                            aria-controls="panel-http-feriavirtual-test-feriafair360"
                                                            aria-selected="true">
                        Entrar a la feria
                    </a></li>
            </ul>
            <a title="fair 360 feria virtual" class="nav-link bg-light" href="#" data-widget="iframe-scrollright"><i
                    class="fas fa-angle-double-right"></i></a>
            <a title="fair 360 feria virtual" class="nav-link bg-light" href="#" data-widget="iframe-fullscreen"><i class="fas fa-expand"></i></a>
            <a title="fair 360 feria virtual" class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </div>
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
<script>

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
