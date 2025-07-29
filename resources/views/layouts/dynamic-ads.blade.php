<div
    x-data="adController"
    x-cloak
    class="card mt-3 p-3"
>
    <h5 class="mb-3">Imágenes de publicidad</h5>

    <!-- Publicidad 1 -->
    <div class="mb-3">
        <label class="form-label">Primera imagen</label>
        <input type="file" name="principal.publicidad1" class="form-control" required>
        @if (!empty($facade_screen_fronts['publicidad1']))
            <div class="mt-2">
                <img src="{{ $facade_screen_fronts['publicidad1'] }}" alt="Publicidad 1" class="img-thumbnail" width="150">
            </div>
        @endif
        <small class="form-text text-muted">Sube una imagen para la publicidad #1</small>
    </div>

    <!-- Publicidad 2 -->
    <div class="mb-3" x-show="position === 'right' || position === 'left'">
        <label class="form-label">Segunda imagen</label>
        <input type="file" name="facade_screen_fronts.publicidad2" class="form-control">
        <small class="form-text text-muted">Sube una imagen para la publicidad #2</small>
    </div>

    <!-- Publicidad 3 -->
    <div class="mb-3" x-show="position === 'left'">
        <label class="form-label">Tercera imagen</label>
        <input type="file" name="facade_screen_fronts.publicidad3" class="form-control">
        <small class="form-text text-muted">Sube una imagen para la publicidad #3</small>
    </div>

    <!-- Publicidad 4 -->
    <div class="mb-3" x-show="position === 'left'">
        <label class="form-label">Cuarta imagen</label>
        <input type="file" name="facade_screen_fronts.publicidad4" class="form-control">
        <small class="form-text text-muted">Sube una imagen para la publicidad #4</small>
    </div>
</div>