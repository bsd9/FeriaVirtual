<div>
    <div class="modal fade modal-lg" id="registroModal" tabindex="-1" role="dialog" aria-labelledby="registroModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <!-- Formulario de registro -->
                    <form method="POST" action="{{ route('singup') }}">
                        @csrf

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="name" id="name"  wire:model.lazy="name" class="form-control" required>
                                    @error('name')
                                    <span class="text-danger er">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Apellido</label>
                                    <input type="text" name="last_name" id="last_name" wire:model.lazy="last_name" class="form-control" required>
                                    @error('last_name')
                                    <span class="text-danger er">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="email" name="email" id="email" wire:model.lazy="email" class="form-control" required>
                                    @error('email')
                                    <span class="text-danger er">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nationality">Nacionalidad</label>
                                    <input type="text" name="nationality" id="nationality"  wire:model.lazy="nationality" class="form-control"
                                        required>
                                        @error('nationality')
                                        <span class="text-danger er">{{$message}}</span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="geolocation" wire:model.lazy="nationality" id="geolocation">



                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" wire:click.prevent="Store()" class="btn btn-warning close-modal">
                                guardar
                                <i class="fa-solid fa-highlighter"></i>
                            </button>
                        </div>
                    </form>


                </div>

            </div>
        </div>
    </div>
    @include('livewire.scripts.event')
</div>
