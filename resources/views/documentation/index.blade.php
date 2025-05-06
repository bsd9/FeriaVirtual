<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="msapplication-TileColor" content="#272531">
    <meta name="theme-color" content="#272531">
    <link rel="stylesheet" type="text/css" href="{{asset('docs/app.css')}}">
    <title>Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más</title>
    <meta name="title" content="Descubre la Feria Virtual de Fair360: Eventos, Expositores y Más">
    <meta name="description" content="Explora la feria virtual de Fair360, donde encontrarás una amplia variedad de expositores, eventos, stands y oportunidades de networking. Únete a nosotros y descubre todo lo que nuestra feria tiene para ofrecer.">
    <meta name="author" content="Fair360">
    <meta property="og:site_name" content="Feria Virtual Fair360">
</head>
<body>


<div class="bg-dark position-relative">

    <div class="container pt-md-4 pt-2 position-relative">
        <header class="d-flex flex-wrap align-items-center justify-content-center py-3 mb-4 px-4 position-relative">
            <a href="/" class="d-flex align-items-center mb-0 me-md-auto text-dark text-decoration-none">
                <img src="{{asset('img/welcome/logoFair360.png')}}" title="logo fair 360" class="logo" alt="fair360">
            </a>
                <h3>Manual de usuario</h3>

        </header>
    </div>
</div>

<div class="documentation position-relative mb-5 mt-md-4 overflow-hidden">

    <div class="container position-relative" id="docs">
        <div class="row g-0 m-0 px-0 rounded-3 overflow-hidden">

            <div class="col-12 col-lg-auto bg-grey py-lg-3 d-flex flex-column text-balance" style="background:#F9F9FE;z-index: 2">
                <nav class="nav-docs px-lg-5 py-2 px-3">
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Primero pasos</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.documentacion') ? 'border-primary text-primary ' : '' }}">
                            <a href="{{ route('platform.intro') }}" class="text-decoration-none text-primary">
                                Introducción
                            </a>
                        </li>
                    </ul>

                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Clientes</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.clientes') ? 'border-primary text-primary' : '' }}">
                            <a href="{{ route('platform.clientes') }}" class="text-decoration-none {{ request()->routeIs('platform.clientes') ? 'text-primary' : '' }}">
                                Visitantes
                            </a>
                        </li>
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Configuración</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.compania') ? 'border-primary text-primary' : '' }}">
                            <a href="{{ route('platform.compania')}}" class="text-decoration-none ">
                                Compañías
                            </a>
                        </li>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.feria') ? 'border-primary text-primary' : '' }} ">
                            <a href="{{route('platform.feria')}}" class="text-decoration-none ">
                                Feria
                            </a>
                        </li>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.estantes') ? 'border-primary text-primary' : '' }} ">
                            <a href="{{route('platform.estantes')}}" class="text-decoration-none ">
                                Stands
                            </a>
                        </li>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.auditorio') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.auditorio')}}" class="text-decoration-none ">
                                Auditorio
                            </a>
                        </li>
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Configuración y accesos</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.config.organizacion') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.config.organizacion')}}" class="text-decoration-none ">
                                Organización
                            </a>
                        </li>
{{--                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.config.roles') ? 'border-primary text-primary' : '' }} ">--}}
{{--                            <a href="{{route('platform.config.roles')}}" class="text-decoration-none ">--}}
{{--                                Roles--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">
                        Expositores y Asistentes</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.expo.asistentes') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.expo.asistentes')}}" class="text-decoration-none ">
                                Asistentes
                            </a>
                        </li>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.expo.expositores') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.expo.expositores')}}" class="text-decoration-none ">
                                Expositores
                            </a>
                        </li>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.expo.eventos') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.expo.eventos')}}" class="text-decoration-none ">
                                Eventos
                            </a>
                        </li>
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Fachada Imágenes</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.fachada.fachada') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.fachada.fachada')}}" class="text-decoration-none ">
                                Fachada principal
                            </a>
                        </li>
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Fair360</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.fair360.new') ? 'border-primary text-primary' : '' }} ">
                            <a href="{{route('platform.fair360.new')}}" class="text-decoration-none ">
                                Noticias
                            </a>
                        </li>
                    </ul>
                    <p class="h5 font-weight-normal my-lg-3 my-2 me-2 me-lg-0 d-none d-md-inline-block" style="color: #22184D8C">Organizacion</p>

                    <ul>
                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.organizacion.category') ? 'border-primary text-primary' : '' }}">
                            <a href="{{route('platform.organizacion.category')}}" class="text-decoration-none ">
                                Categoría
                            </a>
                        </li>
{{--                        <li class="border-start border-3 px-2 px-lg-3 py-1 {{ request()->routeIs('platform.organizacion.poppus') ? 'border-primary text-primary' : '' }} ">--}}
{{--                            <a href="{{route('platform.organizacion.poppus')}}" class="text-decoration-none ">--}}
{{--                                Popups--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </nav>
            </div>
            <div class="col-12 col-md me-auto bg-white py-lg-3">
             @yield('content')
            </div>
        </div>
    </div>
</div>





<div class="footer bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-md-5 footer-tentacles"></div>

            <div class="col-12 col-md-7">
                <div class="px-md-4 py-md-5 my-md-5 pb-5 px-3">
                    <h1 class="display-4 fw-bold mb-4 mb-md-5">
                        <span class="text-primary">Y</span> muchas cosas <span class="text-primary">más.</span>
                    </h1>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="../../js/app.js?id=9d4e86d4549e5eb343ecfbe378ddf0fb"></script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript"> (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date(); for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }} k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(42925369, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); </script> <noscript><div><img src="../../watch/42925369" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<!-- /Yandex.Metrika counter -->

<script async="">
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-39757298-4', 'auto');
    ga('send', 'pageview');
</script>

<link rel="stylesheet" href="../../npm/docsearch.js%402/dist/cdn/docsearch.min.css">
<script type="text/javascript" src="../../npm/docsearch.js%402/dist/cdn/docsearch.min.js"></script>
<script type="text/javascript">
    if (window.document.getElementById('docsearch')) {
        docsearch({
            apiKey: 'afc2a7f7d4f201489dcd8c4f0f40bde2',
            indexName: 'orchid_software',
            inputSelector: '#docsearch',
            algoliaOptions: {'facetFilters': ["lang:" + document.documentElement.lang]},
            debug: true
        });
        document.addEventListener('keydown', (e) => {
            if (e.keyCode === 111 || e.keyCode === 191) {
                e.preventDefault()
                document.getElementById('docsearch').focus();
            }
            if (e.keyCode === 27) {
                document.getElementById('docsearch').blur();
                e.preventDefault()
            }
        })
    }
</script>

</body>
</html>
