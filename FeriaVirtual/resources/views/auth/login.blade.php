<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" data-controller="html-load" dir="{{ \Orchid\Support\Locale::currentDir() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <title>
        @yield('title', config('app.name'))
        @hasSection('title')
        - {{ config('app.name') }}
        @endif
    </title>
    <meta name="csrf_token" content="{{ csrf_token() }}" id="csrf_token">
    <meta name="auth" content="{{ Auth::check() }}" id="auth">
    @if(\Orchid\Support\Locale::currentDir(app()->getLocale()) == "rtl")
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/orchid.rtl.css','vendor/orchid') }}">
    @else
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/orchid.css','vendor/orchid') }}">
    @endif

    @stack('head')

    <meta name="turbo-root" content="{{ Dashboard::prefix() }}">
    <meta name="dashboard-prefix" content="{{ Dashboard::prefix() }}">

    @if(!config('platform.turbo.cache', false))
    <meta name="turbo-cache-control" content="no-cache">
    @endif

    <script src="{{ mix('/js/manifest.js','vendor/orchid') }}" type="text/javascript"></script>
    <script src="{{ mix('/js/vendor.js','vendor/orchid') }}" type="text/javascript"></script>
    <script src="{{ mix('/js/orchid.js','vendor/orchid') }}" type="text/javascript"></script>

    @foreach(Dashboard::getResource('stylesheets') as $stylesheet)
    <link rel="stylesheet" href="{{ $stylesheet }}">
    @endforeach

    @stack('stylesheets')

    @foreach(Dashboard::getResource('scripts') as $scripts)
    <script src="{{ $scripts }}" defer type="text/javascript"></script>
    @endforeach

    @if(!empty(config('platform.vite', [])))
    @vite(config('platform.vite'))
    @endif

    <style>
        .image-container {
            text-align: center;
        }

        .image-container img {
            display: block;
            margin: 10px;
            width: 100px;
            height: 100px;
        }

        .virtual-label {
            text-align: center;
            margin-top: 5px;
        }

        .image-label {
            display: grid;
            place-items: center;
        }

        #circle span {
            align-content: center;
            position: absolute;
            font-display: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            height: 100px;
            width: 100px;
            font-size: 10px;
            text-align: center;
            transform-origin: bottom center;
        }
    </style>
</head>

<body class="{{ \Orchid\Support\Names::getPageNameClass() }}" data-controller="pull-to-refresh">

    <div class="container-fluid" data-controller="@yield('controller')" @yield('controller-data')>

        <div class="row d-md-flex h-100">
            <div class="col-xl-12 col-12">
                <div class="container-md">
                    <div class="form-signin h-full min-vh-100 d-flex flex-column justify-content-center">

                        <div class="row justify-content-center">
                            <div class="col-md-12 col-lg-4 px-md-5">
                                <div class="row" style="margin-top: 50px">
                                    <a class="d-flex justify-content-center align-items-center mb-4 p-0 px-sm-5"
                                        href="{{Dashboard::prefix()}}">
                                        <div class="h2">
                                            @auth
                                            <x-orchid-icon path="bs.house" class="d-inline d-xl-none" />
                                            @endauth

                                            @php
                                            $config = App\Models\Configuration::first();
                                            $img = $config->attachment()->first();

                                            

                                            $fen = App\Models\Configuration::latest()->first();
                                            $imgTwo = $fen->attachment()->first();

                                            // $image = $item->attachment()->first();

                                            // // Get the URL of the file
                                            // $image->url();
                                            @endphp

                                            @if ($config)
                                            <div class="image-container">
                                                <small class="image-label opacity" id="circle">FERIA VIRTUAL</small>
                                                <img src="{{ $img->url()}}" alt="imagen no encontrada"
                                                    class="img-thumbnail rounded-circle">
                                            </div>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 px-md-5">
                                <div class="bg-white p-1 p-sm-5 rounded shadow-sm">
                                    <h1 class="h4 text-black mb-4">{{__('Entrar')}}</h1>

                                    <form class="m-t-md" role="form" method="POST" data-controller="form"
                                        data-form-need-prevents-form-abandonment-value="false" data-action="form#submit"
                                        action="{{ route('platform.login.auth') }}">
                                        @csrf

                                        @includeWhen($isLockUser,'platform::auth.lockme')
                                        @includeWhen(!$isLockUser,'platform::auth.signin')
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-4 px-md-5">
                                <a class="d-flex justify-content-center align-items-center mb-4 p-0 px-sm-5"
                                    href="{{Dashboard::prefix()}}">
                                    <div class="h2">
                                        @auth
                                        <x-orchid-icon path="bs.house" class="d-inline d-xl-none" />
                                        @endauth

                                        @if ($config)
                                        <div class="image-container">
                                            <img src="{{ $imgTwo->url()}}" alt="imagen no encontrada"
                                                class="img-thumbnail rounded-circle">
                                        </div>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="m-4 text-center text-muted">
                            <p>Feria virtual
                                <span title="Love">
                                    <svg height="1.5em" width="1.5em" class="text-success" fill="currentColor" title
                                        role="img" viewBox="0 0 44.07 52.31" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m33.39 33.23c-1.48 1.03-2.83 2.20-4.06 3.52-.23.25-.41.80-.77.63-.38-.18.04-.64 0-1.12-2.09 1.39-3.66 3.21-5.36 5.04v-1.04c-2.14 1.43-4.59 2.12-5.98 4.33l-.10-.77-.22-.14c-2.22 2.74-5.49 4.65-6.41 8.63-.25-4.49-1.24-8.58-3.20-12.5l-.64.84c-.05-1.68-.47-3.07-1.15-4.42l-.58.94c-.31-1.09-.25-2.12-.57-3.07-.09-.26-.21-.54-.25-.84-.08-.5-.27-.97-.94-.36-.04-2.33-.87-4.43-1-6.68-.46.18-.50.77-1.04.79.16-2.00-.30-3.96-.34-6.08l-.44.89-.25-.17c-.10-.80 0-1.59.09-2.39.12-.93.22-1.87.31-2.81.03-.34.43-.84-.38-.85-.20-0-.12-.25-.07-.44.50-1.91.98-3.81 2.06-5.51 2.05-3.22 6.97-7.12 12.11-5.87 2.35.57 4.24 1.80 5.33 4.05.14.30.26.62.31.94.04.23-.03.56.25.58.27.01.31-.34.38-.56.73-2.42 1.44-4.84 2.57-7.11.18-.35.33-.73.56-1.04.18-.25.26-.72.66-.63.41.09.79.33.99.75.22.44-.10.71-.36.94-2.22 2.04-2.98 4.83-3.96 7.53.89-.91 1.63-1.94 2.60-2.76 3.63-3.08 7.69-4.20 12.22-2.46 4.06 1.56 6.51 4.63 7.73 8.78.91 3.11.62 6.13-.37 9.15-.31.95-.51 1.94-.77 2.91-.08.31-.07.72-.62.57-.11-.03-.35.17-.41.31-.66 1.45-1.83 2.57-2.57 3.97-.16.31-.28.64-.51 1.19l-.14-1.38c-1.41 1.80-3.43 2.87-4.69 4.73-.47-.42.06-.70-.06-1.01h.04l-.02-.02zm-14.81-16.07c-.56.30-.52.91-.68 1.40-.17.52-.33.82-.99.55-.99-.39-2.06-.56-3.12-.63-1.24-.09-2.5-.12-3.67.45.34.04.67.03 1.01 0 1.88-.16 3.70.15 5.46.80.54.20.82.43.59 1.14-.53 1.70-.94 3.44-1.38 5.17-.13.53-.34.78-.95.87-1.55.23-3.1.53-4.52 1.57 1.82.06 3.27-1.35 5.01-.89-.40 2.10-.78 4.15-1.18 6.20-.08.41-.15.86-.71.93-.22.03-.24.23-.11.33.55.43.29.97.20 1.46-.27 1.51-.58 3.02-.87 4.53.30-.38.52-.79.57-1.22.06-.50.30-.91.44-1.37.58-2.05.60-2.05 2.14-.47.08-.73-.49-1.01-.88-1.39-.24-.23-.57-.36-.49-.79.36-2.06.71-4.12 1.05-6.18.08-.46.27-.49.73-.43 1.03.12 1.79.76 2.88 1.34-.79-1.08-1.61-1.55-2.67-1.67-.63-.07-.92-.26-.63-1.06.49-1.37.93-2.80 1.05-4.23.10-1.14.67-1.16 1.46-1.20 1.04-.05 2.06.10 3.10.14-1.03-.51-2.13-.64-3.24-.55-.62.05-.78-.08-.60-.75.36-1.34.89-2.65 1.00-4.06.47.09.82-.18 1.18-.39 1.04-.57 2.12-1.04 3.24-1.44 1.66-.60 3.39-.91 5.12-1.21-3.28-.24-6.20.95-9.14 2.39.23-1.53.96-2.81.93-4.26-.53.74-.28 1.76-.94 2.48-1.17-2.34-2.55-4.46-4.98-5.64 2.52 2.14 4.78 4.40 4.61 8.09zm-7.69 18.99c.65-.06 1.09-.32 1.68-.72z" />
                                    </svg>
                                </span>
                                by FenixPuntoNet
                            </p>
                        </div>
                        <p class="small text-center mb-1 px-5">
                            {{ __('Aplicación desarrollada por fénixPuntoNet.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        @include('platform::partials.toast')
    </div>

    <script>
        circle = document.getElementById("circle")
    circlearray = circle.textContent.split('')
    circle.textContent = ''

    var totalLetters = circlearray.length;
    var angleIncrement = 180 / totalLetters;
    var currentAngle = 278;

    for (var i = 0; i < circlearray.length; i++) {
        circle.innerHTML += '<span style="transform:rotate(' +
            currentAngle + 'deg)">' + circlearray[i] + '</span>';
        currentAngle += angleIncrement;
    }
    </script>

</body>

</html>