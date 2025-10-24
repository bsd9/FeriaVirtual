<div>
    <form wire:submit.prevent="submitForm">
        <div class="form__element">
            <div class="form__title">E-mail <span class="required">*</span></div>
            <div class="form__input">
                <input type="email" name="email" wire:model="email" required>
            </div>
        </div>
        @error('email') <span class="error">{{ $message }}</span> @enderror

        
        <div class="form__element">
            <div class="form__title">Contraseña <span class="required">*</span></div>
            <div class="form__input">
                <input type="password" name="password" wire:model="password" required>
            </div>
        </div>
        @error('password') <span class="error">{{ $message }}</span> @enderror
        <div class="container-btn-register">
        <div class="">
            <button type="" class="btn-registers btn-cancel modal__close">
            <span class=""> CANCELAR</span>
            </button>
        </div>
        <div class="form__button">
            <button type="submit" class="btn-registers btn-register">
                <span class="">INGRESAR</span>
            </button>
        </div>
        </div>
    
        @if ($errorMessage)
            <div class="error">{{ $errorMessage }}</div>
        @endif
    </form>
</div>