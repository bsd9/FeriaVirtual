<header class="header--public">
    <div class="header__primary">
        <div class="header__wrap">
            <div class="header__flex">

                <!-- Header Mobile -->
                <div class="header__mobile">

                    <!-- Logo dinámico de la feria -->
                    @if($feria && $feria->logo)
                        @php
                            $attachment = $feria->attachment()->where('attachments.id', $feria->logo)->first();
                        @endphp

                        @if($attachment)
                            <div class="header__logo">
                                <a href="{{ route('principal') }}">
                                    <img src="{{ $attachment->url }}" alt="Logo de la Feria" class="logo-fv">
                                </a>
                            </div>
                        @endif
                    @endif

                    <!-- Fechas -->
                    <div class="containerDate">
                        <div class="">
                            <div class="textBoldDate">17–20</div>
                            <div class="mes">MARZO</div>
                        </div>
                        <div class="separador"></div>
                        <span class="textBoldDate">2027</span>
                    </div>

                    <!-- Botones Mobile -->
                    <div class="header__item header__item--button">
                        <a href="{{ route('facade') }}" class="btn-flex">
                            <span class="btn-text">Explora</span>
                            <img src="/img/icnExplora.png" alt="Icono explora" class="imgHeaderExplora">
                        </a>
                    </div>

                    <div class="header__item header__item--button">
                        <a data-modal-register class="btn-flex">
                            <span class="btn-text">Inscríbete</span>
                            <img src="/img/icnRegistrate.png" alt="Icono inscríbete" class="imgHeaderInscribete">
                        </a>
                    </div>

                    <div class="header__item header__item--button">
                        <a data-modal-login class="btn-flex">
                            <span class="btn-text">Ingresa</span>
                            <img src="/img/icnIngresa.png" alt="Icono ingresa" class="imgHeaderIngresa">
                        </a>
                    </div>

                </div>

                <!-- Header Desktop -->
                <div class="header__desktop">

                    <!-- Logo dinámico de la feria -->
                    @if($feria && $feria->logo)
                        @php
                            $attachment = $feria->attachment()->where('attachments.id', $feria->logo)->first();
                        @endphp

                        @if($attachment)
                            <div class="header__logo">
                                <a href="{{ route('principal') }}">
                                    <img src="{{ $attachment->url }}" alt="Logo de la Feria" class="logo-fv">
                                </a>
                            </div>
                        @endif
                    @endif

                    <!-- Fechas -->
                    <div class="containerDate">
                        <div class="">
                            <div class="textBoldDate">17–20</div>
                            <div class="mes">MARZO</div>
                        </div>
                        <div class="separador"></div>
                        <span class="textBoldDate">2027</span>
                    </div>

                </div>

                <!-- Botones Desktop -->
                <div class="header__right">

                    <div class="header__item header__item--button">
                        <a href="{{ route('facade') }}" class="btn-flex">
                            <span class="btn-text">Explora</span>
                            <img src="/img/icnExplora.png" alt="Icono explora" class="imgHeaderExplora">
                        </a>
                    </div>

                    <div class="header__item header__item--button">
                        <a data-modal-register class="btn-flex">
                            <span class="btn-text">Inscríbete</span>
                            <img src="/img/icnRegistrate.png" alt="Icono inscríbete" class="imgHeaderInscribete">
                        </a>
                    </div>

                    <div class="header__item header__item--button">
                        <a data-modal-login class="btn-flex">
                            <span class="btn-text">Ingresa</span>
                            <img src="/img/icnIngresa.png" alt="Icono ingresa" class="imgHeaderIngresa">
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</header>