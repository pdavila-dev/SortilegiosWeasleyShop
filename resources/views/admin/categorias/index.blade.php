@extends('layouts.app')

@section('subtitle', 'Categorías')
@section('content_header_title', 'Categorías')
@section('content_header_subtitle', 'Listado')

@section('content_body')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <span class="card-title mb-0">Categorías de productos</span>
            <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus-circle mr-1"></i> Nueva Categoría
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Slug</th>
                        <th>Descuento</th>
                        <th>Productos</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categorias as $categoria)
                        <tr>
                            <td>#{{ $categoria->id_tipo_producto }}</td>
                            <td>
                                <strong>{{ optional($categoria->detalle)->descripcion_tipo_producto ?? 'Sin descripción' }}</strong>
                            </td>
                            <td>
                                <code>{{ $categoria->slug }}</code>
                            </td>
                            <td>
                                <span class="badge badge-info">{{ number_format($categoria->descuento, 2) }}%</span>
                            </td>
                            <td>
                                <span class="badge badge-secondary">{{ $categoria->productos_count }} productos</span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST"
                                      class="d-inline-block"
                                      onsubmit="return confirm('¿Eliminar esta categoría? Esta acción no se puede deshacer.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                No se han creado categorías todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

