<header class="header--public">
    <div class="header__primary">
        <div class="header__wrap">
            <div class="header__flex">
                <div class="header__mobile">
                    <div class="header__logo">
                        <a href="{{route('principal')}}">
                            <img src="{{ asset('img/Logos/logoFair360.png') }}" title="logo fair360" alt="logo fair 360">
                        </a>
                    </div>
                    <div class="header__text"><span><strong>17,18,19</strong> y <strong>20</strong> de <strong>marzo 2027</strong></span>
                    </div>
                    <div class="header__button">
                        <a data-modal-register class="btn">
                            <span class="btn-text">Inscripción</span>
                            <span class="fa fa-pen icon-movil"></span>
                        </a>
                    </div>

                    <div class="header__button">
                        <a href="{{ route('facade') }}" class="btn">
                            <span class="btn-text">Visitante</span>
                            <span class="fa fa-eye icon-movil"></span>
                        </a>
                    </div>

                    <div class="header__button">
                        <a data-modal-login class="btn">
                            <span class="btn-text">Ingrese Aquí</span>
                            <span class="fa fa-user icon-movil"></span>
                        </a>
                    </div>

                </div>
                <div class="header__desktop">
                    <div class="header__logo"><a href="{{route('principal')}}"><img
                                src="{{ asset('img/Logos/logoFair360.png') }}" title="logo fair360" alt="logo fair 360" ></a></div>
                    <div class="header__text"><span><strong>17,18,19</strong> y <strong>20</strong> de <strong>marzo 2027</strong></span>
                    </div>


                </div>

                <div class="header__right">
                    <div class="header__item header__item--button">
                        <a data-modal-register class="btn">
                            <span class="btn-text">Inscripción</span>
                            <span class="fa fa-pen icon"></span>
                        </a>
                    </div>


                    <div class="header__item header__item--button">
                        <a href="{{ route('facade') }}" class="btn">
                            <span class="btn-text">Visitante</span>
                            <span class="fa fa-eye icon"></span>
                        </a>
                    </div>

                    <div class="header__item header__item--button">
                        <a data-modal-login class="btn">
                            <span class="btn-text">Ingrese</span>
                            <span class="fa fa-user icon"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>
