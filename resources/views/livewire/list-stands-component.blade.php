<div>
    <div id="list-stands" class="card position-absolute shadow p-3 mb-5 bg-primary bg-opacity-50 text-white rounded">
        <div class="card-body text-center">
            <img src="{{ asset('img/welcome/logoFair360.png') }}" class="card-img-top img-fluid mx-auto" alt="...">
            <h5 class="card-title">Lista de Stands</h5>
            <p class="card-text">Seleccione los estantes de su preferencia, ten en cuenta que puedes hacer un
                automático.</p>
            <hr class="">
            <div class="contenedor">
                @foreach ($stands as $item)
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <strong>{{$item->id}}</strong>
                    </div>
                    <div class="col-md-5">
                        <p><strong>Nombre:</strong> {{$item->name}}</p>
                        <p><strong>Descripción:</strong> {{$item->descripcion}}</p>
                    </div>
                    <div class="col-md-3">
                        <button type="button" class="btn btn-primary ir-stand"
                            wire:click="showStandDetail({{$item->id}})">
                            Visitar
                        </button>
                    </div>
                </div>
                <hr class="">
                @endforeach
            </div>
        </div>

    </div>
</div>
