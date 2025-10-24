<div>
    <div class="position-relative">
        @if ($go)
        @livewire('stands-componente')
        @else
        <div class="col-md-12">
            <img class="img" alt="Responsive image" src="{{ asset('img/Fachada (2) OK.jpg') }}"
                alt="Mi Imagen" style="width: 100%; height: 100%; object-fit: cover;">
        </div>
        <div class="fixed-bottom text-center">
            <div class="d-flex justify-content-center mb-4">
                
                <button class="btn btn-transparent btn-lg  shadow-lg mx-2 text-white"
                    style="transition: background-color 0.3s, border-color 0.3s;" wire:click="stands">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
                        class="bi bi-airplane-engines-fill" viewBox="0 0 16 16">
                        <path
                            d="M8 0c-.787 0-1.292.592-1.572 1.151A4.347 4.347 0 0 0 6 3v3.691l-2 1V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.191l-1.17.585A1.5 1.5 0 0 0 0 10.618V12a.5.5 0 0 0 .582.493l1.631-.272.313.937a.5.5 0 0 0 .948 0l.405-1.214 2.21-.369.375 2.253-1.318 1.318A.5.5 0 0 0 5.5 16h5a.5.5 0 0 0 .354-.854l-1.318-1.318.375-2.253 2.21.369.405 1.214a.5.5 0 0 0 .948 0l.313-.937 1.63.272A.5.5 0 0 0 16 12v-1.382a1.5 1.5 0 0 0-.83-1.342L14 8.691V7.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v.191l-2-1V3c0-.568-.14-1.271-.428-1.849C9.292.591 8.787 0 8 0Z" />
                    </svg>
                </button>
                
            </div>
        </div>
        @endif
    </div>
</div>
