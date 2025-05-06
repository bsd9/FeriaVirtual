<div>
    @if ($atras)
        @livewire('principal.feria-component')
    @else

        @if (count($data) > 0)
            @if ($currentIndex > 0)
                <button class="btn btn-lg position-absolute top-btn custom-button dinamy-izquierda "
                        style="top: 50%; left: 5%; transform: translate(-50%, -50%); z-index: 1;"
                        wire:click="showPreviousData">
                </button>
            @endif
            <div style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; overflow: hidden;">
                @if ($data[$currentIndex]->type == 'basic')
                    <div>
                        @include('livewire.principal.stands.imgDynamic.basic')
                    </div>
                @elseif($data[$currentIndex]->type === 'medium')
                    <div>
                        @include('livewire.principal.stands.imgDynamic.medium')
                    </div>
                @elseif($data[$currentIndex]->type === 'high')
                    <div>
                        @include('livewire.principal.stands.imgDynamic.high')
                    </div>
                @endif
            </div>
                <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="background: rgba(0, 0, 0, 0.8); border: none;">

                            <!-- Encabezado del modal -->
                            <div class="modal-header" style="border: none; background-color: #0375bf;">
                                <!-- Botón de cierre -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"
                                        style="color: white; font-size: 1.5rem;"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div style="position: relative; padding-bottom: 56.25%;">
                                    <!-- Proporción 16:9 para hacer el iframe responsive -->
                                    <iframe id="videoIframe" class="w-100 h-100 position-absolute top-0 left-0"
                                            src="{{ $this->determinarIframe() }}?controls=0&modestbranding=1&rel=0&showinfo=0&autohide=1&playsinline=1"
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

                <button class="btn btn-lg position-absolute custom-button dinamy-derecha"
                    style="top: 50%; right: 5%; transform: translate(50%, -50%); z-index: 1;" wire:click="showNextData">
                </button>

        @else
            <p>No hay datos disponibles.</p>
        @endif
    @endif
        <script>
            var closeButton = document.querySelector('.modal-header .btn-close');
            closeButton.addEventListener('click', function () {
                var videoIframe = document.getElementById('videoIframe');
                if(videoIframe){
                    videoIframe.src = '{{ $this->determinarIframe() }}'
                }
            });
            document.getElementById('videoIframe').src = "{{ $this->determinarIframe() }}"
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });

        </script>

</div>
