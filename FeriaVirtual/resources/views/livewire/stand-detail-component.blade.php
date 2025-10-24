<div>
    @if ($stand->type == 'basic')
        <div>
            @include('livewire.standsImgs.basic')
        </div>
    @elseif($stand->type === 'medium')
        <div>
            @include('livewire.standsImgs.medium')
        </div>
    @elseif($stand->type === 'high')
        <div>
            @include('livewire.standsImgs.high')
        </div>
    @endif

    <div class="modal fade" id="view" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background: rgba(0, 0, 0, 0.8); border: none;">
                <div class="modal-header modal-event" style="border: none; background-color: #0375bf; color: white">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"
                            style="color: white; font-size: 1.5rem;"></button>
                </div>
                <div class="modal-body p-0">
                    <div style="position: relative; padding-bottom: 56.25%;">
                        <iframe id="videoIframe" class="w-100 h-100 position-absolute top-0 left-0"
                                src="{{$this->determinarIframe()}}?controls=0&modestbranding=1&rel=0&showinfo=0&autohide=1&playsinline=1"
                                title="" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var closeButton = document.querySelector('.modal-header .btn-close');
        closeButton.addEventListener('click', function () {
            var videoIframe = document.getElementById('videoIframe');
            if (videoIframe) {
                videoIframe.src = '{{ $this->determinarIframe() }}'
            }
        });
        document.getElementById('videoIframe').src = "{{ $this->determinarIframe() }}"
    </script>
</div>



