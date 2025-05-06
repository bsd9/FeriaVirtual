<div>
    <div class="modal fade modal-scrollbar-measure" id="staticBackdrop" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog card">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Galería de imágenes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body" style="position: relative; padding: 0;">
                    <img src="{{$popups->attachment()->first()->url}}" alt="{{$popups->name}}" title="galeria de imagenes">
                </div>

            </div>
        </div>
    </div>
</div>


