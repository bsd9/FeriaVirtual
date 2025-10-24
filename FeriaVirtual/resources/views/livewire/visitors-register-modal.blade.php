<div>
    <div class="modal__form">
        <div class="modal__tab">
            <form class="form form--register form--validation" wire:submit.prevent="submit">

                <div class="cols">
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Primer Nombre <span class="required">*</span></div>
                            <div class="form__input">
                                <input type="text" name="first_name" placeholder=""
                                    wire:model="first_name" required class="input-rut">
                            </div>
                        </div>
                        @error('first_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Segundo Nombre</div>
                            <div class="form__input">
                                <input type="text"  wire:model="second_name"  name="second_name">
                            </div>
                        </div>
                        @error('second_name') <span class="error">{{ $message }}</span> @enderror


                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Primer apellido <span class="required">*</span></div>
                            <div class="form__input">
                                <input type="text"  wire:model="first_last_name"  name="first_last_name"  required>
                            </div>
                        </div>
                        @error('first_last_name') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Segundo apellido <span class="required">*</span></div>
                            <div class="form__input">
                                <input type="text"  wire:model="second_last_name"  name="second_last_name"  required>
                            </div>
                        </div>
                        @error('second_last_name') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-xs-12 col-md-12">
                        <div class="form__element">
                            <div class="form__title">E-mail <span class="required">*</span></div>
                            <div class="form__input">
                                <input type="email" wire:model="email" name="email" required>
                            </div>
                        </div>
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Teléfono <span class="required">*</span></div>
                            <div class="form__input">
                                <input id="phone" wire:model="phone" type="text" name="phone" required>
                            </div>
                        </div>
                        @error('phone') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Sexo <span class="required">*</span></div>
                            <div class="form__input">
                                <select name="gender" wire:model="gender" required>
                                    <option value="seleccionar">Selecciona una opción</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                    <option value="otros">Otro</option>
                                </select>
                            </div>
                        </div>
                        @error('gender') <span class="error">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Nacionalidad <span class="required">*</span></div>
                            <div class="form__input">
                                <input id="nationality"  wire:model="nationality" type="text" name="nationality" required>
                            </div>

                        </div>
                        @error('nationality') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Contraseña <span class="required">*</span></div>
                            <div class="form__input">
                                <input id="password"  wire:model="password" type="password" name="password" required>
                            </div>

                        </div>
                        @error('password') <span class="error">{{ $message }}</span> @enderror

                    </div>
                    <div class="col-xs-12">
                        <div class="modal__checkboxs">
                            <div class="modal__checkbox padding">
                                <label>
                                    <input wire:model="accept_terms" type="checkbox" name="accept_terms" value="1" required>Acepto los <a
                                        href="{{route('/termsAndConditions')}}"
                                        target="_blank" class="terms"> términos y condiciones de Virtual EX</a>
                                </label>

                            </div>
                            @error('accept_terms') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="modal__checkboxs">
                            <div class="modal__checkbox">
                                <label class="container__terms">
                                    <input wire:model="join_specialists_program" type="checkbox" name="join_specialists_program" value="1">
                                    <div>Quiero ser parte del programa
                                    Círculo de Especialistas de Virtual Ex, con sus exclusivos
                                    beneficios.
                                        <a class="terms"
                                            href="{{route('/termsAndConditions')}}"
                                            target="_blank"> Ver términos, condiciones y políticas de
                                            privacidad</a>
                                    </div> 
                                </label>
                            </div>
                            @error('join_specialists_program') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class= "container-btn-register">
                        <div class="">
                            <button type="" class="btn-registers btn-cancel modal__close">
                            <span class=""> CANCELAR</span>
                            </button>
                        </div>
                        <div class="form__button">
                            <button type="submit" class=" btn-registers btn-register">
                                <span class=""> REGISTRARTE</span>
                            </button>
                        </div>
                        </div>
                        <div class="form__alert"><span></span></div>
                    </div>
                </div>
            </form>
            @if(session()->has('success'))
                <p>{{ session('success') }}</p>
            @endif
        </div>
    </div>
</div>