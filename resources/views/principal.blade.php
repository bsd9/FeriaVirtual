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
                            <div class="section__body">
                                <div class="section__body__va">
                                    <h1 class="section__title">¡Se parte del evento de capacitación más grande de
                                        Latinoamérica!</h1>
                                    <p class="section__description">Inscríbase de forma gratuita y participe el próximo
                                        17, 18, 19 y 20 de marzo en la edición 2027 de la Gran Feria de ventas
                                        fair360.</p>
                                    <div class="section__buttons"><a data-modal-register
                                            class="btn btn--transparent">Inscripción<span
                                                class="fa fa-angle-right"></span></a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @endforeach
                <div class="section-slider__thumbs section__thumbs">
                    <div class="carousel-thumbnails">
                        <div class="cols cols-gutter-0">
                            <div class="col-xs-3 col-md-3 col-lg-3 carousel-thumbnail dscroll">
                                <div class="section__thumb">
                                    <div class="section__thumb__bar"></div>
                                    <div class="section__thumb__title">¡Sea parte del evento de capacitación más grande
                                        de Latinoamérica!</div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 col-lg-3 carousel-thumbnail dscroll">
                                <div class="section__thumb">
                                    <div class="section__thumb__bar"></div>
                                    <div class="section__thumb__title">¡Especialización al alcance de su mano!</div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 col-lg-3 carousel-thumbnail dscroll">
                                <div class="section__thumb">
                                    <div class="section__thumb__bar"></div>
                                    <div class="section__thumb__title">¡10 años acompañando a maestros y maestras
                                        especialistas!</div>
                                </div>
                            </div>
                            <div class="col-xs-3 col-md-3 col-lg-3 carousel-thumbnail dscroll">
                                <div class="section__thumb">
                                    <div class="section__thumb__bar"></div>
                                    <div class="section__thumb__title">¡10 años acompañando a maestros y maestras
                                        especialistas!</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section--blog">
        <div parallax="-0.07,0" class="section__house"><img src="{{ asset('img/principal/lines.svg') }}" title="imagen-diseño" alt="lineas de diseño"></div>
        <div class="section__wrap">
            <div class="section__header">
                <h3 class="section__title">Noticias</h3>
                <p class="section__description">Revise las ultimas actualidades de la feriaVirtual.</p>
            </div>
            <div class="section__body">
                <div class="cols cols-scroll">

                    @foreach ($blogs as $item)
                         <div class="col-md-4 dscroll">
                        <article class="article--blog">
                            <div class="article__bg">
                                <div class="bg">
                                    @foreach ($item->attachment as $img )
                                    <img src="{{$img->url}}" title="imagenes fair 360" alt="imagen-fair-360">
                                    @endforeach
                                </div>
                            </div>
                            <div class="article__body">
                                <h4 class="article__title">{{$item->title}}</h4>
                                <p class="article__description">{!! Str::limit($item->content, 50, '...') !!}</p>
                                <a href="{{ route('blog.show', ['id' => $item->id]) }}" class="btn btn--link">Ver más <span class="fa fa-angle-right"></span></a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="section--stats section--light">
        <div parallax="0.07,0" class="section__lines"><img src="{{ asset('img/principal/lines.svg') }}" title="lineas diseño" alt="lineas de-diseño"></div>
        <div class="section__wrap">
            <div class="section__header">
                <h3 class="section__title">Marcas y Auspiciadores</h3>
                <p class="section__description">Visite las más de 60 marcas líderes del mundo de la construcción en un
                    interactivo espacio virtual dedicado al maestro especialista.</p>
            </div>
            <div class="section__body">
                <h4 class="section__title">Auspiciadores colaboradores</h4>
                <div class="cols">
                    @foreach ($ImagesCollaborators as $item)
                    <div class="col-xs-6 col-md-3 dscroll">
                        <div class="section__trademark">
                                @foreach ($item->attachment as $attachment)
                                <img src="{{ $attachment->url }}" title="colaboradores" alt="colaboradores-fair360">
                                @endforeach
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <div class="modal modal--register" id="register">
        <div class="modal__back"></div>
        <div class="modal__front">
            <div class="modal__box">
                <div class="modal__close"><span class="fa fa-close"> </span></div>
                <div class="modal__content">
                    <h3 class="modal__title">Regístrate</h3>
                    @livewire('visitors-register-modal')

                </div>
            </div>
        </div>
    </div>

    <div class="modal modal--login">
        <div class="modal__back"></div>
        <div class="modal__front">
            <div class="modal__box">
                <div class="modal__close"><span class="fa fa-close"> </span></div>
                <div class="modal__content">
                    <h3 class="modal__title">Inicie sesión </h3>
                    <p class="modal__description">Si no está inscrito, <strong data-modal-inscripcion>Presione
                            acá</strong></p>
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
            color: red;
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

