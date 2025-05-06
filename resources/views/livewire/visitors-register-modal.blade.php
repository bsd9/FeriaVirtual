<div>
    <div class="modal__form">
        <div class="modal__tab">
            <form class="form form--register form--validation" wire:submit.prevent="submit">

                <div class="cols">
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Primer Nombre <span class="required">*</span></div>
                            <div class="form__input">
                                <input type="text" name="first_name" placeholder="Primer Nombre"
                                    wire:model="first_name" required class="input-rut">
                            </div>
                        </div>
                        @error('first_name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <div class="form__element">
                            <div class="form__title">Segundo Nombre </div>
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
                            <div class="form__title">Email <span class="required">*</span></div>
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
                                    <option value="seleccionar">Seleccionar</option>
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
                            <div class="modal__checkbox">
                                <label>
                                    <input wire:model="accept_terms" type="checkbox" name="accept_terms" value="1" required>Acepto los <a
                                        href="{{route('/termsAndConditions')}}"
                                        target="_blank"> términos y condiciones de Fair360</a>
                                </label>

                            </div>
                            @error('accept_terms') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="modal__checkboxs">
                            <div class="modal__checkbox">
                                <label>
                                    <input wire:model="join_specialists_program" type="checkbox" name="join_specialists_program" value="1">Quiero ser parte del programa
                                    Circulo de Especialistas de BlueFair, con sus exclusivos
                                    beneficios. <a
                                        href="{{route('/termsAndConditions')}}"
                                        target="_blank"> Ver términos, condiciones y políticas de
                                        privacidad</a>
                                </label>
                            </div>
                            @error('join_specialists_program') <span class="error">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form__button">
                            <button type="submit" class="btn">
                                <span class="btn-text"> Registrar</span>
                                <i class="fa-solid fa-paper-plane icon"></i>
                            </button>
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
