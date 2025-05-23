@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <a href="{{ route('uploadImage.create') }}" class="btn btn-primary">Nuevo producto</a>

                <div class="card mt-3">
                    <div class="card-header">Productos</div>

                    <div class="card-body">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Imagenes</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($stand as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @foreach ($product->media as $image)
                                            <img src="{{ $image->getUrl('thumb') }}" alt="imagen no encontrada">
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{route('uploadImage.edit', $product->id)}}" class="btn btn-success">
                                            Editar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
