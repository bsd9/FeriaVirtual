<div>

    @if($home)
        @livewire('principal.feria-component')
    @else
        <a id="home" class="btn btn-sm my-4 mx-2 position-absolute custom-button3 button-imagen-izquierda-atras-auditorio" wire:click="home">

        </a>
        <div> @include('livewire.audience.audienne') </div>
    @endif
    <div class="modal fade" id="videoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background: rgba(0, 0, 0, 0.8); border: none;">
                <div class="modal-header modal-event" style="border: none; background-color: #0375bf; color: white">
                    <h5 class="modal-title" id="exampleModalLabel">{{$this->nombre}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"
                            style="color: white; font-size: 1.5rem;"></button>
                </div>
                <div class="modal-body p-0">
                    <div style="position: relative; padding-bottom: 56.25%;">
                        <iframe id="videoIframe" class="w-100 h-100 position-absolute top-0 left-0"
                                src="{{$this->video_evento}}?controls=0&modestbranding=1&rel=0&showinfo=0&autohide=1&playsinline=1"
                                title=""
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var closeButton = document.querySelector('.modal-header .btn-close');


        closeButton.addEventListener('click', function () {
            // Obtén el elemento del video
            var videoIframe = document.getElementById('videoIframe');

            // Detén el video estableciendo el atributo src a una cadena vacía
            if (videoIframe) {
                videoIframe.src = '{{ $this->video_evento }}';
            }
        });


        document.getElementById('videoIframe').src = "{{ $this->video_evento }}";
    </script>

</div>
