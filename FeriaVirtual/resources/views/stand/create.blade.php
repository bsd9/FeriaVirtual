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
                                <label for="name" class="form-label">Nombre del stand <span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" value="{{ old('name') }}" required/>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="feria_id" class="form-label">Feria <span class="text-danger">*</span></label>
                                <select name="feria_id" id="feria_id" class="form-control @error('feria_id') is-invalid @enderror" required>
                                    <option value="">Selecciona una feria</option>
                                    @foreach ($ferias as $feria)
                                        <option value="{{ $feria->id }}" {{ old('feria_id') == $feria->id ? 'selected' : '' }}>
                                            {{ $feria->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('feria_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Selector de Pabellón -->
                            <div class="mb-3">
                                <label for="pavilion_id" class="form-label">Pabellón <span class="text-danger">*</span></label>
                                <select name="pavilion_id" id="pavilion_id" class="form-control @error('pavilion_id') is-invalid @enderror" required>
                                    <option value="">Selecciona un pabellón</option>
                                    @foreach ($pavilions as $pavilion)
                                        <option value="{{ $pavilion->id }}" {{ old('pavilion_id') == $pavilion->id ? 'selected' : '' }}>
                                            {{ $pavilion->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('pavilion_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Selector de Tipo de Stand -->
                            <div class="mb-3">
                                <label for="type" class="form-label">Tipo de stand <span class="text-danger">*</span></label>
                                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                                    <option value="">Selecciona un tipo</option>
                                    <option value="basic" {{ old('type') == 'basic' ? 'selected' : '' }}>Básico</option>
                                    <option value="medium" {{ old('type') == 'medium' ? 'selected' : '' }}>Medio</option>
                                    <option value="high" {{ old('type') == 'high' ? 'selected' : '' }}>Alto</option>
                                </select>
                                @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descriptions" class="form-label">Descripción <span class="text-danger">*</span></label>
                                <textarea name="descriptions" class="form-control @error('descriptions') is-invalid @enderror"
                                          id="descriptions" rows="3" required>{{ old('descriptions') }}</textarea>
                                @error('descriptions')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen <span class="text-danger">*</span></label>
                                <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" id="image" required/>
                                @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection