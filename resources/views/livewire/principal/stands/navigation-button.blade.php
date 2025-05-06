<div>
    <button class="btn btn-success btn-lg shadow-lg text-white position-absolute"
        style="transition: background-color 0.3s, border-color 0.3s; top: 50%; left: 10%; transform: translate(-50%, -50%); z-index: 1;"
        wire:click="accionBotonIzquierdo">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill"
            viewBox="0 0 16 16">
            <path
                d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
        </svg>
    </button>

    <!-- Botón derecho -->
    <button class="btn btn-success btn-lg shadow-lg text-white position-absolute"
        style="transition: background-color 0.3s, border-color 0.3s; top: 50%; right: 10%; transform: translate(50%, -50%); z-index: 1;"
        wire:click="accionBotonDerecho">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            class="bi bi-caret-right-fill" viewBox="0 0 16 16">
            <path
                d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
        </svg>
    </button>
</div>