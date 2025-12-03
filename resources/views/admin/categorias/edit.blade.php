@extends('layouts.app')

@section('subtitle', 'Categorías')
@section('content_header_title', 'Editar Categoría')
@section('content_header_subtitle', $categoria->detalle->descripcion_tipo_producto ?? 'Sin descripción')

@section('content_body')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.categorias.update', $categoria) }}">
                @csrf
                @method('PUT')

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="descripcion_tipo_producto">Descripción de la Categoría *</label>
                    <input type="text"
                           class="form-control @error('descripcion_tipo_producto') is-invalid @enderror"
                           id="descripcion_tipo_producto"
                           name="descripcion_tipo_producto"
                           value="{{ old('descripcion_tipo_producto', $categoria->detalle->descripcion_tipo_producto ?? '') }}"
                           required>
                    @error('descripcion_tipo_producto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="slug">Slug (URL amigable) *</label>
                    <input type="text"
                           class="form-control @error('slug') is-invalid @enderror"
                           id="slug"
                           name="slug"
                           value="{{ old('slug', $categoria->slug) }}"
                           required>
                    <small class="form-text text-muted">Solo letras minúsculas, números y guiones. Se usará en la URL.</small>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="descuento">Descuento (%) *</label>
                    <input type="number"
                           class="form-control @error('descuento') is-invalid @enderror"
                           id="descuento"
                           name="descuento"
                           value="{{ old('descuento', $categoria->descuento) }}"
                           min="0"
                           max="100"
                           step="0.01"
                           required>
                    @error('descuento')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="imagen_url">URL de Imagen (opcional)</label>
                    <input type="text"
                           class="form-control @error('imagen_url') is-invalid @enderror"
                           id="imagen_url"
                           name="imagen_url"
                           value="{{ old('imagen_url', $categoria->imagen_url) }}"
                           placeholder="https://ejemplo.com/imagen.jpg">
                    @error('imagen_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Actualizar Categoría
                    </button>
                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times mr-1"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection

