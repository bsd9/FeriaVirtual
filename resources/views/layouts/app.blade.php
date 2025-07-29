<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido a Feria Virtual - Fair360</title>

    <style>
        [x-cloak] { display: none !important; }
    </style>



    <meta name="description" content="¡Bienvenido a la Feria Virtual de Fair360! Explora una amplia variedad de expositores, eventos y oportunidades de networking. ¡Únete a nosotros y descubre todo lo que nuestra feria tiene para ofrecer!">



    <link rel="icon" href="{{ asset('img/welcome/logoFair360.png') }}" type="image/png">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">



    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">



    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">



    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">



    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>



    <link rel="stylesheet" href="https://cdn.plyr.io/3.6.4/plyr.css"/>

    <script src="https://cdn.plyr.io/3.6.4/plyr.polyfilled.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    @livewireStyles

    <style>

        .modal-backdrop {

            --bs-backdrop-zindex: 1050;

            --bs-backdrop-bg: #000;

            --bs-backdrop-opacity: 0.5;

            position: fixed;

            top: 0;

            left: 0;

            z-index: var(--bs-backdrop-zindex);

            width: 100vw;

            height: auto;

            background-color: var(--bs-backdrop-bg);

        }

    </style>

    @stack('styles')

</head>



<body class="app-body">

<div class="div-content-app">

    @yield('content')

</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

@livewireScripts

@push('scripts')
    <!-- ✅ Alpine.js: SIN ESPACIOS -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- ✅ Tu componente Alpine -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('adController', () => ({
                position: '{{ $facade_screen_fronts['position'] ?? 'principal' }}',

                init() {
                    this.syncSelect();
                    this.observeDOM();
                },

                syncSelect() {
                    const select = document.querySelector('select[name="facade_screen_fronts.position"]');
                    if (select) {
                        this.position = select.value || 'principal';
                        ['input', 'change'].forEach(event => {
                            select.addEventListener(event, (e) => this.position = e.target.value);
                        });
                    }
                },

                observeDOM() {
                    const observer = new MutationObserver(this.syncSelect);
                    observer.observe(document.body, { childList: true, subtree: true });
                    setTimeout(this.syncSelect, 1000);
                }
            }));
        });
    </script>

    <!-- ✅ Mueve TODOS los scripts que dependen de Alpine.js aquí -->
    <script>
        Livewire.on('openModal', () => {
            $('#view').modal('show');
        });

        function checkScreenSize() {
            if (window.matchMedia("(max-width: 550px)").matches) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Por favor, gire su dispositivo para una mejor experiencia.",
                    footer: '<a href="#">¿Por qué tengo este problema?</a>'
                });
            }
        }

        window.addEventListener('load', checkScreenSize);
        window.addEventListener('resize', checkScreenSize);

        document.addEventListener('livewire:load', function () {
            var swalAlert;

            Livewire.on('showAlert', function (message, email) {
                swalAlert = Swal.fire({
                    title: "No tienes este privilegio?",
                    text: "No tienes permitido a este espacio.",
                    icon: "question",
                    showCloseButton: false,
                    confirmButtonText: 'Entendido'
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalAlert.close();
                    }
                });
            });

            Livewire.on('notPermitido', function (title, content) {
                swalAlert = Swal.fire({
                    title: title,
                    text: content,
                    icon: "question",
                    showCloseButton: false,
                    confirmButtonText: 'Ir'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.top.location.href = "/";
                    }
                });
            });

            Livewire.on('notEvent', function (title, content) {
                swalAlert = Swal.fire({
                    html: `
                        <div class="alert">
                            <p><strong></strong></p>
                            <p class="text-danger">¡Oops!, Acceso denegado</p>
                            <p class="text-secondary-emphasis">Lo sentimos, parece que no tienes los permisos suficientes para acceder a este espacio.</p>
                            <p>Por favor, comunícate con el equipo de soporte al.</p>
                            <p class="number-contact alert alert-info">321 000 0000</p>
                        </div>
                    `,
                    icon: "error",
                    showCloseButton: false,
                    confirmButtonText: 'Confirmar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        swalAlert.close();
                    }
                });
            });
        });

        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endpush

@stack('scripts') <!-- ✅ Ahora sí se inyecta -->

<script>
    Livewire.on('openModal', () => {
        $('#view').modal('show');
    });

    function checkScreenSize() {
        if (window.matchMedia("(max-width: 550px)").matches) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor, gire su dispositivo para una mejor experiencia.",
                footer: '<a href="#">¿Por qué tengo este problema?</a>'
            });
        }
    }

    window.addEventListener('load', checkScreenSize);
    window.addEventListener('resize', checkScreenSize);

    document.addEventListener('livewire:load', function () {
        var swalAlert;

        Livewire.on('showAlert', function (message, email) {
            swalAlert = Swal.fire({
                title: "No tienes este privilegio?",
                text: "No tienes permitido a este espacio.",
                icon: "question",
                showCloseButton: false,
                confirmButtonText: 'Entendido'
            }).then((result) => {
                if (result.isConfirmed) {
                    swalAlert.close();
                }
            });
        });

        Livewire.on('notPermitido', function (title, content) {
            swalAlert = Swal.fire({
                title: title,
                text: content,
                icon: "question",
                showCloseButton: false,
                confirmButtonText: 'Ir'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.top.location.href = "/";
                }
            });
        });

        Livewire.on('notEvent', function (title, content) {
            swalAlert = Swal.fire({
                html: `
                    <div class="alert">
                        <p><strong></strong></p>
                        <p class="text-danger">¡Oops!, Acceso denegado</p>
                        <p class="text-secondary-emphasis">Lo sentimos, parece que no tienes los permisos suficientes para acceder a este espacio.</p>
                        <p>Por favor, comunícate con el equipo de soporte al.</p>
                        <p class="number-contact alert alert-info">321 000 0000</p>
                    </div>
                `,
                icon: "error",
                showCloseButton: false,
                confirmButtonText: 'Confirmar',
            }).then((result) => {
                if (result.isConfirmed) {
                    swalAlert.close();
                }
            });
        });
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>

@bukScripts(true)

</body>



</html>

