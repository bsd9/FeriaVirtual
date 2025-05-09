@extends('layouts.principal_layouts')

@section('content')

<div id="sections">

    <section class="section--main section-slider section--dark">

        <div class="carousel">

            <div class="section-slider_slides">

                @foreach ($imagesSlide as $image )

                <div class="carousel-contents">

                    <div class="carousel-content">

                        <div class="section__bg">

                            <div class="bg"><img src="{{$image->url}}" title="imagemn-fair360" alt="imagen-fair-360"></div>

                        </div>

                        <div class="section__wrap section__wrap--main">


                                <div class="section__body__va">

                                    <h1 class="section__title">¡Se parte del evento de capacitación más grande de

                                        Latinoamérica!</h1>

                                        <p class="section__description">Inscríbete de forma gratuita y participa del 17 al 20 de marzo de 2027 de la gran feria de ventas Virtual Ex</p>

                                    <div class="section__buttons"><a data-modal-register

                                            class="btn btn--transparent">Inscripción<span

                                                class="fa fa-angle-right"></span></a></div>

                                </div>


                        </div>

                    </div>



                </div>

                @endforeach

            </div>

        </div>

    </section>

    <div class="modal modal--register" id="register">

        <div class="modal__back"></div>

        <div class="modal__front">

            <div class="modal__box">

                <div class="modal__content">

                    <h3 class="modal__title titleRegister">Por favor diligencia este formulario para completar tu inscripción</h3>

                    @livewire('visitors-register-modal')


                </div>

            </div>

        </div>

    </div>



    <div class="modal modal--login">

        <div class="modal__back"></div>

        <div class="modal__front">

            <div class="modal__box">

                <div class="modal__content">
                    <img src="img/icnLogin.png" alt="Icono login" class="icnLogin">
                    <h3 class="modal__title titleLogin">Por favor ingresa tus datos para iniciar sesión </h3>

                    <div class="modal__form">

                        <div class="modal__tab">

                            <div class="tabs tabs--login">



                              @livewire('visitors-modal')

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

@push('css')

    <style>

        .required {

            color: #58DCFF;

        }



    </style>

@endpush



@push('js')

    <script>

        document.addEventListener('livewire:load', function () {

            Livewire.on('showAlert', function (message, email) {



                var registerModal = document.getElementById('register');

                if (registerModal) {

                    registerModal.style.display = 'none';

                }



                Swal.fire({

                    title: 'Éxito',

                    html: '✉️ ' + message + '<br>Email: ' + email,

                    toast: true,

                    icon: 'success',

                    timer: 3000, // Temporizador de 3 segundos

                    position: 'top-end', // Posición en la parte superior derecha

                    showConfirmButton: false

                }).then(function () {

                    location.reload();

                });

            });

            Livewire.on('existLogin', function (message, userSession) {

                Swal.fire({

                    title: "Acceso no permitido",

                    text: "Primero debes cerrar las sesiones anteriores. ¿Deseas cerrarlas?",

                    icon: "error",

                    showCancelButton: true,

                    confirmButtonText: 'Confirmar',

                    cancelButtonText: 'Cancelar'

                }).then((result) => {

                    if (result.isConfirmed) {

                        Livewire.emit('confirmExistLogin', userSession);

                    }

                });

            });








        });

    </script>

@endpush