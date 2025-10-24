<div>
    <div class="position-relative">
        @if ($standOne)
             @livewire('stand-one-componente')
        @elseif($facade)
             @livewire('facade-componente')       
        @else
        <div class="col-md-12">
            <img class="img" alt="Responsive image" src="{{ asset('img/open.jpg') }}" alt="Mi Imagen"
                style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="fixed-bottom text-center">
            <div class="d-flex justify-content-center mb-4">
                <button class="btn btn-transparent btn-icon text-white" wire:click="goToFacade" title="Ir hacia atrás">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">

                        <path
                            d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                    </svg>
                </button>
                <button class="btn btn-transparent btn-icon text-white" wire:click="goToOne"
                    title="Ir hacia adelante">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-arrow-right-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                    </svg>
                </button>
            </div>
        </div>
        @endif

    </div>
</div>