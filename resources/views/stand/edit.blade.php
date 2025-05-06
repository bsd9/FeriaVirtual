@extends('layouts.app')

@section('content')
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-3">
                    <div class="card-body">
                        <form method="post" action="{{ route('uploadImage.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nombre del producto <span
                                        class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name',$stand->name) }}" required/>
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="feria_id" class="form-label">Feria</label>
                                <select name="feria_id" id="feria_id"
                                        class="form-control @error('feria_id') is-invalid @enderror">
                                    <option value="">{{$stand->feria->name}}</option>
                                    @foreach ($ferias as $feria)
                                        <option
                                            value="{{ $feria->id }}" {{ $feria->name == $feria->id ? 'selected' : '' }}>{{ $feria->name }}</option>
                                    @endforeach
                                </select>
                                @error('feria_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descriptions" class="form-label">Descripción <span
                                        class="text-danger">*</span></label>
                                <input name="descriptions" type="text"
                                       class="form-control @error('descriptions') is-invalid @enderror"
                                       id="descriptions" value="{{ old('descriptions',$stand->descriptions) }}"
                                       required/>
                                @error('descriptions')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Cambiar imagen</label>
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="image"/>
                                @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Vista previa de las imágenes -->
                            <div class="mb-3">
                                <label for="image-preview" class="form-label">Vista previa de las imágenes</label>
                                <div class="d-flex flex-wrap gap-2" id="image-preview-container">
                                </div>
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- CSS personalizado para el campo de entrada tipo file -->
    <style>
        .input-file {
            padding: 0.375rem 0.75rem;
            font-size: 0.875rem;
        }

        #image-preview-container {
            margin-top: 10px;
        }
    </style>

    <!-- Script para mostrar la vista previa de las imágenes y eliminarlas -->
    <script>
        document.getElementById('media').addEventListener('change', function (e) {
            const imagePreviewContainer = document.getElementById('image-preview-container');
            const fileCountSpan = document.getElementById('file-count');
            imagePreviewContainer.innerHTML = ''; // Clear existing previews
            const fileCount = e.target.files.length;

            for (let i = 0; i < fileCount; i++) {
                const file = e.target.files[i];
                const imagePreview = document.createElement('div');
                imagePreview.className = 'me-3 mb-3';

                const imgElement = document.createElement('img');
                imgElement.className = 'img-thumbnail';
                imgElement.src = URL.createObjectURL(file);
                imgElement.style.width = '50px';
                imgElement.style.height = '50px';

                const removeButton = document.createElement('a');
                removeButton.href = '#';
                removeButton.innerHTML = '<i class="fas fa-times-circle text-danger fa-lg"></i>';
                removeButton.addEventListener('click', function (event) {
                    event.preventDefault();
                    imagePreviewContainer.removeChild(imagePreview);
                    updateFileCount();
                });

                imagePreview.appendChild(imgElement);
                imagePreview.appendChild(removeButton);
                imagePreviewContainer.appendChild(imagePreview);
            }

            updateFileCount();
        });

        function updateFileCount() {
            const fileCount = document.getElementById('image-preview-container').childElementCount;
            document.getElementById('file-count').textContent = fileCount + (fileCount === 1 ? ' imagen seleccionada' : ' imágenes seleccionadas');
        }
    </script>
@endsection
