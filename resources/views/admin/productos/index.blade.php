@extends('layouts.app')

@section('subtitle', 'Productos')
@section('content_header_title', 'Productos')
@section('content_header_subtitle', 'Listado')

@section('content_body')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header d-flex align-items-center">
            <span class="card-title mb-0">Productos registrados</span>
            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary btn-sm ml-auto">
                <i class="fas fa-plus-circle mr-1"></i> Nuevo
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Oferta</th>
                        <th>Stock actual</th>
                        <th>Tipos</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr>
                            <td>#{{ $producto->id_producto }}</td>
                            <td>{{ optional($producto->descripcion)->descripcion_producto ?? 'Sin descripción' }}</td>
                            <td>${{ number_format($producto->precio_actual, 2) }}</td>
                            <td>
                                @if ($producto->oferta)
                                    <span class="badge badge-success">
                                        Sí ({{ $producto->preu_oferta ?? '—' }})
                                    </span>
                                @else
                                    <span class="badge badge-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $producto->stock_actual }}</td>
                            <td>
                                @forelse ($producto->tipos as $tipo)
                                    <span class="badge badge-info mr-1">{{ $tipo->etiqueta }}</span>
                                @empty
                                    <span class="text-muted">Sin tipos</span>
                                @endforelse
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.productos.edit', $producto) }}" class="btn btn-sm btn-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST"
                                      class="d-inline-block"
                                      onsubmit="return confirm('¿Eliminar este producto?')">
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
                            <td colspan="7" class="text-center text-muted py-4">
                                No se han cargado productos todavía.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($productos->hasPages())
            <div class="card-footer">
                {{ $productos->links() }}
            </div>
        @endif
    </div>
@endsection

