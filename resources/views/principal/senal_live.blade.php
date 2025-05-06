@extends('layouts.principal_single_layout')
@section('content')
<div id="sections">
    <section class="section--header">
        <div class="section__bg">
            <div class="bg"> <img src="img/uploads/señal-en-vivo.jpg"></div>
        </div>
        <div class="section__wrap section__wrap--header--media">
            <div class="section__media">
                <div class="section__content section--center">
                    <h1 class="section__title">Señal en vivo</h1>
                    <p class="section__description">Participe junto a nosotros durante las cuatro jornadas de la Gran
                        Feria de Capacitación. Contenidos en vivo dedicados a maestros y maestras especialistas,
                        concursos y mucha entretención. </p>
                    <div class="embed-container">
                        <iframe  title="vimeo-player" style="position:absolute;top:0;left:0;width:100%;height:100%;"
                                 src="https://www.youtube.com/embed/pOi2aKG8WXw?controls=0&modestbranding=1&rel=0&showinfo=0&autohide=1&playsinline=1"
                            title="Servicios Fénix Punto Net" frameborder="0"
                            allowfullscreen="1" class="m-auto"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section--blog">
        <div parallax="-0.07,0" class="section__house"><img src="{{ asset('img/principal/lines.svg') }}"></div>
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
                                    <img src="{{$img->url}}">
                                    @endforeach
                                </div>
                            </div>
                            <div class="article__body">
                                <h4 class="article__title">{{$item->title}}</h4>
                                <p class="article__description">{!! Str::limit($item->content, 50, '...') !!}</p>
                                <a href="{{ route('blog.show', ['id' => $item->id]) }}" class="btn btn--link">Ver más
                                    <span class="fa fa-angle-right"></span></a>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="modal modal--contact">
        <div class="modal__back"></div>
        <div class="modal__front">
            <div class="modal__box">
                <div class="modal__close"><span class="fa fa-close"> </span></div>
                <div class="modal__content">
                    <h3 class="modal__title">Contactar a Alberto Fernandez</h3>
                    <div class="modal__form">
                        <form class="form form--register">
                            <div class="cols">
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Nombre y Apellido</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Email</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Teléfono</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Mensaje</div>
                                        <div class="form__input">
                                            <textarea name="#" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__button">
                                        <button class="btn">Enviar<span class="fa fa-pencil"></span></button>
                                    </div>
                                    <div class="form__alert"><span></span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal--profile">
        <div class="modal__back"></div>
        <div class="modal__front">
            <div class="modal__box">
                <div class="modal__close"><span class="fa fa-close"> </span></div>
                <div class="modal__content">
                    <h3 class="modal__title">Complete su información</h3>
                    <div class="modal__form">
                        <form class="form form--register">
                            <div class="cols">
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Título del dato</div>
                                        <div class="form__input">
                                            <input type="text" name="#" placeholder="Restaurador de muebles" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Email</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Teléfono / Celular</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Rubro</div>
                                        <div class="form__input">
                                            <select name="#">
                                                <option value="#">Colus
                                                </option>
                                                <option value="#">Mi
                                                </option>
                                                <option value="#">Facilisis
                                                </option>
                                                <option value="#">Sagittis
                                                </option>
                                                <option value="#">Litora
                                                </option>
                                                <option value="#">Colus
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form__element">
                                        <div class="form__title">Ciudad</div>
                                        <div class="form__input">
                                            <select name="#">
                                                <option value="#">Ad
                                                </option>
                                                <option value="#">Egestas
                                                </option>
                                                <option value="#">Sagittis
                                                </option>
                                                <option value="#">Vel
                                                </option>
                                                <option value="#">Vestibulum
                                                </option>
                                                <option value="#">Ultricies
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form__element">
                                        <div class="form__title">Comuna</div>
                                        <div class="form__input">
                                            <select name="#">
                                                <option value="#">Vestibulum
                                                </option>
                                                <option value="#">Laoreet
                                                </option>
                                                <option value="#">Duis
                                                </option>
                                                <option value="#">Torquent
                                                </option>
                                                <option value="#">Fames
                                                </option>
                                                <option value="#">Aliquam
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Descripción del servicio</div>
                                        <div class="form__input">
                                            <textarea name="#" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="modal__checkboxs">
                                        <div class="modal__checkbox">
                                            <label>
                                                <input type="checkbox" name="#" value="1" required>Acepto <a
                                                    href="#">Términos y condiciones </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__button">
                                        <button class="btn">Enviar<span class="fa fa-pencil"></span></button>
                                    </div>
                                    <div class="form__alert"><span></span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal modal--competition">
        <div class="modal__back"></div>
        <div class="modal__front">
            <div class="modal__box">
                <div class="modal__close"><span class="fa fa-close"> </span></div>
                <div class="modal__content">
                    <h3 class="modal__title">Ingrese sus datos y ya estará participando</h3>
                    <div class="modal__form">
                        <form class="form form--register">
                            <div class="cols">
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Nombre</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Apellido</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Email</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Teléfono / Celular</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__element">
                                        <div class="form__title">Profesión</div>
                                        <div class="form__input">
                                            <input type="text" name="#" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="modal__checkboxs">
                                        <div class="modal__checkbox">
                                            <label>
                                                <input type="checkbox" name="#" value="1" required>Acepto <a
                                                    href="#">Términos y condiciones </a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form__button">
                                        <button class="btn">Participar<span class="fa fa-pencil"></span></button>
                                    </div>
                                    <div class="form__alert"><span></span></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
