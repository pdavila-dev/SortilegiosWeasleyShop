@extends('layouts.app')

@section('subtitle', 'Pedido')
@section('content_header_title', 'Detalle del Pedido')
@section('content_header_subtitle', '#' . $pedido->id_pedido)

@section('content_body')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Cliente</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="40%">Nombre:</th>
                            <td>{{ $pedido->nombre_contacto }}</td>
                        </tr>
                        <tr>
                            <th>Correo:</th>
                            <td>{{ $pedido->correo_contacto }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de Cliente:</th>
                            <td>
                                @if ($pedido->user->registrado)
                                    <span class="badge badge-success">Cliente Registrado</span>
                                    @if ($pedido->user->registrado->correo_electronico)
                                        <br><small class="text-muted">{{ $pedido->user->registrado->correo_electronico }}</small>
                                    @endif
                                @else
                                    <span class="badge badge-secondary">Cliente No Registrado</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dirección de Envío:</th>
                            <td>{{ $pedido->direccion_envio ?? 'No especificada' }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Pedido</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="40%">ID Pedido:</th>
                            <td>#{{ $pedido->id_pedido }}</td>
                        </tr>
                        <tr>
                            <th>Fecha:</th>
                            <td>{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Hora Inicio:</th>
                            <td>{{ $pedido->hora_inicio_compra ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Hora Fin:</th>
                            <td>{{ $pedido->hora_fin_compra ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>IP:</th>
                            <td>{{ $pedido->ip_compra ?? '—' }}</td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td><strong class="text-success">{{ number_format($pedido->total_pedido, 2) }} Galeones</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Productos del Pedido</h3>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Descripción</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-right">Precio Unitario</th>
                        <th class="text-right">Descuento</th>
                        <th class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->items as $item)
                        <tr>
                            <td>#{{ $item->id_producto }}</td>
                            <td>{{ $item->descripcion_producto ?? 'Sin descripción' }}</td>
                            <td class="text-center">{{ $item->cantidad }}</td>
                            <td class="text-right">{{ number_format($item->precio_unitario, 2) }} G</td>
                            <td class="text-right">
                                @if ($item->descuento > 0)
                                    <span class="text-danger">-{{ number_format($item->descuento, 2) }}%</span>
                                @else
                                    —
                                @endif
                            </td>
                            <td class="text-right"><strong>{{ number_format($item->precio_final, 2) }} G</strong></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-right">Total del Pedido:</th>
                        <th class="text-right text-success">{{ number_format($pedido->total_pedido, 2) }} G</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.pedidos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Volver al listado
        </a>
    </div>
@endsection

