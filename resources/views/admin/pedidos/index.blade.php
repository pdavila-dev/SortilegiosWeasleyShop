@extends('layouts.app')

@section('subtitle', 'Pedidos')
@section('content_header_title', 'Pedidos')
@section('content_header_subtitle', 'Listado')

@section('content_body')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-3">
            <div class="card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Pedidos</h5>
                    <h3 class="mb-0">{{ $totalPedidos }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Ingresos</h5>
                    <h3 class="mb-0">{{ number_format($totalIngresos, 2) }} G</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Listado de Pedidos</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cliente</th>
                        <th>Correo</th>
                        <th>Total</th>
                        <th>Items</th>
                        <th class="text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pedidos as $pedido)
                        <tr>
                            <td>#{{ $pedido->id_pedido }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}
                                <br>
                                <small class="text-muted">
                                    {{ $pedido->hora_fin_compra ?? '—' }}
                                </small>
                            </td>
                            <td>
                                {{ $pedido->nombre_contacto }}
                                <br>
                                <small class="text-muted">
                                    @if ($pedido->user->registrado)
                                        <span class="badge badge-success">Registrado</span>
                                    @else
                                        <span class="badge badge-secondary">No registrado</span>
                                    @endif
                                </small>
                            </td>
                            <td>{{ $pedido->correo_contacto }}</td>
                            <td>
                                <strong>{{ number_format($pedido->total_pedido, 2) }} G</strong>
                            </td>
                            <td>
                                <span class="badge badge-info">{{ $pedido->items->count() }} productos</span>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('admin.pedidos.show', $pedido) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Ver
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-4">
                                No se han encontrado pedidos.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($pedidos->hasPages())
            <div class="card-footer">
                {{ $pedidos->links() }}
            </div>
        @endif
    </div>
@endsection

