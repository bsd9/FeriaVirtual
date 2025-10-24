@extends('layouts.principal_single_layout')
@section('content')
<div id="sections">
    <section class="section--header">
        <div class="section__bg">
            <div class="bg"> <img src="{{$blog->attachment()->first()->url}}"></div>
        </div>
        <div class="section__wrap section__wrap--header">
            <div class="section__content section--center">
                <h1 class="section__title">{{$blog->title}}</h1>
            </div>
        </div>
    </section>
    <section class="section--content">
        <div class="section__wrap section--md">
            <div class="section__body">
                <div class="section__content">
                    <h2>{{$blog->title}}</h2>
                    <p>{!! $blog->content !!}</p>
                    <img style="width: 100%; height: auto;"  src="{{$blog->attachment()->first()->url}}">
                </div>
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
                                            <option value="#">Leo
                                            </option>
                                            <option value="#">Litora
                                            </option>
                                            <option value="#">Tristique
                                            </option>
                                            <option value="#">Mattis
                                            </option>
                                            <option value="#">Donec
                                            </option>
                                            <option value="#">Euismod
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
                                            <option value="#">Gravida
                                            </option>
                                            <option value="#">Velit
                                            </option>
                                            <option value="#">Sociosqu
                                            </option>
                                            <option value="#">Commodo
                                            </option>
                                            <option value="#">Cras
                                            </option>
                                            <option value="#">Risus
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
                                            <option value="#">Ultrices
                                            </option>
                                            <option value="#">Aptent
                                            </option>
                                            <option value="#">Ut
                                            </option>
                                            <option value="#">Fames
                                            </option>
                                            <option value="#">Accumsan
                                            </option>
                                            <option value="#">Pulvinar
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