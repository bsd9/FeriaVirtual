<div>
    @if($standsLocation)
        @livewire('principal.stands.stand-to-fair-component')
    @elseif($home)
        @livewire('principal.facade-feria-component')
    @elseIf($audience)
        @livewire('audience.audience-componenente')
    @else
        @if ($imageUrl)
            <div>
                @include('livewire.principal.imgInterior')
                <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                     aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="background: rgba(0, 0, 0, 0.8); border: none;">
                            <div class="modal-header" style="border: none; background: #0375bf;">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"
                                        style="color: white; font-size: 1.5rem;"></button>
                            </div>
                            <div class="modal-body p-0">
                                <div style="position: relative; padding-bottom: 56.25%;">
                                    <iframe id="videoIframe" class="w-100 h-100 position-absolute top-0 left-0"
                                            src="{{ $selectedStandType === 'medium' ? $standMediumSelect->company->ifrema : ($selectedStandType === 'high' ? $standHighSlelect->company->ifrema : '') }}?controls=0&modestbranding=1&rel=0&showinfo=0&autohide=1&playsinline=1"
                                            title="" frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <p>No hay imagen disponible</p>
        @endif
        {{-- @livewire('social-networks') --}}

    @endif

        <script>

            var closeButton = document.querySelector('.modal-header .btn-close');
            closeButton.addEventListener('click', function () {
                var videoIframe = document.getElementById('videoIframe');
                if (videoIframe) {
                    videoIframe.src = '{{ $selectedStandType === 'medium' ? $standMediumSelect->company->ifrema : ($selectedStandType === 'high' ? $standHighSlelect->company->ifrema : '') }}';
                }
            });
            document.getElementById('videoIframe').src = "{{ $selectedStandType === 'medium' ? $standMediumSelect->company->ifrema : ($selectedStandType === 'high' ? $standHighSlelect->company->ifrema : '') }}";
        </script>
</div>


