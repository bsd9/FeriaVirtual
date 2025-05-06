@extends('layouts.principal_single_layout')
@section('content')
<div id="sections">
    <section class="section--header">
        <div class="section__bg">
            <div class="bg"> <img src="img/uploads/stands.jpg"></div>
        </div>
        <div class="section__wrap section__wrap--header">
            <div class="section__content">
                <h1 class="section__title">Stands</h1>
                <p class="section__description">Explora los stands líderes de la industria al hacer clic directamente en
                    los logos de las principales marcas. También puedes buscar por especialidad o rubro según tus
                    preferencias.
                </p>
            </div>
        </div>
    </section>
    <section class="section--stands">
        <div class="section__bg">
            <div class="bg"> <img src="{{ asset('img/stands/fondo.png') }}"></div>
        </div>
        <div class="section__wrap">
            <div class="section__body">
                <div class="section__tabs">
                    <div class="tabs tabs--stands">
                        <div class="tabs__body">
                            <div class="tab tab--current">
                                <div class="section__stands">
                                    <div class="cols">
                                        <section class="section--stands">
                                            <div class="section__bg">
                                                <div class="bg"> <img src="img/uploads/6.jpeg"></div>
                                            </div>
                                            <div class="section__wrap">
                                                <div class="section__body">
                                                    <div class="section__tabs">
                                                        <div class="tabs tabs--stands">
                                                            <div class="tabs__header">
                                                                <div class="tab tab--current">Electricidad y Gasfitería
                                                                </div>
                                                            </div>
                                                            <div class="tabs__body">
                                                                <div class="tab tab--current">
                                                                    <div class="section__stands">
                                                                        <div class="cols">
                                                                            @foreach ($stands as $item)
                                                                            <div class="col-xs-6 col-md-3 dscroll">                                                                               
                                                                                <div class="section__stand">
                                                                                    <a href="{{$item->pagina_web}}">
                                                                                        @foreach ($item->attachment as $img )
                                                                                            <img src="{{$img->url}}">
                                                                                        @endforeach
                                                                                    </a>
                                                                                </div>                                                                               
                                                                            </div>     
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="sticky">
        <div class="sticky__icon"> <a href="https://www.circulodeespecialistas.cl/registro" target="_blank"> <img
                    src="img/icons/icon-circulo-especialistas.png"></a></div>
    </div>
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
                                                <option value="#">Dui
                                                </option>
                                                <option value="#">Nunc
                                                </option>
                                                <option value="#">Ut
                                                </option>
                                                <option value="#">Pulvinar
                                                </option>
                                                <option value="#">Posuere
                                                </option>
                                                <option value="#">Duis
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
                                                <option value="#">Fusce
                                                </option>
                                                <option value="#">Quisque
                                                </option>
                                                <option value="#">Diam
                                                </option>
                                                <option value="#">Ut
                                                </option>
                                                <option value="#">Erat
                                                </option>
                                                <option value="#">Scelerisque
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
                                                <option value="#">Dapibus
                                                </option>
                                                <option value="#">Phasellus
                                                </option>
                                                <option value="#">Donec
                                                </option>
                                                <option value="#">Interdum
                                                </option>
                                                <option value="#">Colus
                                                </option>
                                                <option value="#">Laoreet
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

    @endsection