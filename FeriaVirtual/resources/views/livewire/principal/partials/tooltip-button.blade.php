<button class="btn btn-light btn-lg rounded-circle shadow-lg position-absolute {{ $class }}"
    style="top: 5%; left: 50%; transform: translate(-50%, -50%); z-index: 1;" wire:click="{{ $clickAction }}"
    data-bs-toggle="tooltip" data-bs-placement="{{ $position }}" data-bs-custom-class="custom-tooltip"
    data-bs-title="{{ $title }}">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi {{ $icon }}"
        viewBox="0 0 16 16">
        <!-- Icono del botón -->
    </svg>
</button>