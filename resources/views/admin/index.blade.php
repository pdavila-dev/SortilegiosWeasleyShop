@extends('layouts.app')

@section('subtitle', 'Panel de Administración')
@section('content_header_title', 'Dashboard')
@section('content_header_subtitle', 'Resumen General')

@section('content_body')
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPedidos }}</h3>
                    <p>Total Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{ route('admin.pedidos.index') }}" class="small-box-footer">
                    Ver todos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalIngresos, 2) }}<small style="font-size: 20px"> G</small></h3>
                    <p>Total Ingresos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-coins"></i>
                </div>
                <a href="{{ route('admin.pedidos.index') }}" class="small-box-footer">
                    Ver pedidos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalProductos }}</h3>
                    <p>Productos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
                <a href="{{ route('admin.productos.index') }}" class="small-box-footer">
                    Gestionar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalCategorias }}</h3>
                    <p>Categorías</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tags"></i>
                </div>
                <a href="{{ route('admin.categorias.index') }}" class="small-box-footer">
                    Gestionar <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Clientes</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="description-block border-right">
                                <span class="description-percentage text-success">
                                    <i class="fas fa-users"></i>
                                </span>
                                <h5 class="description-header">{{ $totalClientes }}</h5>
                                <span class="description-text">TOTAL CLIENTES</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="description-block">
                                <span class="description-percentage text-info">
                                    <i class="fas fa-user-check"></i>
                                </span>
                                <h5 class="description-header">{{ $clientesRegistrados }}</h5>
                                <span class="description-text">REGISTRADOS</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="description-block">
                                <span class="description-percentage text-secondary">
                                    <i class="fas fa-user-times"></i>
                                </span>
                                <h5 class="description-header">{{ $clientesNoRegistrados }}</h5>
                                <span class="description-text">NO REGISTRADOS</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pedidos Recientes</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Fecha</th>
                                <th class="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pedidosRecientes as $pedido)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.pedidos.show', $pedido) }}">
                                            #{{ $pedido->id_pedido }}
                                        </a>
                                    </td>
                                    <td>{{ $pedido->nombre_contacto }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pedido->fecha_pedido)->format('d/m/Y') }}</td>
                                    <td class="text-right">{{ number_format($pedido->total_pedido, 2) }} G</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        No hay pedidos recientes
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('admin.pedidos.index') }}" class="btn btn-sm btn-primary">
                        Ver todos los pedidos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Accesos Rápidos</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="{{ route('admin.productos.create') }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus-circle mr-2"></i>Nuevo Producto
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.categorias.create') }}" class="btn btn-success btn-block">
                                <i class="fas fa-plus-circle mr-2"></i>Nueva Categoría
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.pedidos.index') }}" class="btn btn-info btn-block">
                                <i class="fas fa-shopping-cart mr-2"></i>Ver Pedidos
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.productos.index') }}" class="btn btn-warning btn-block">
                                <i class="fas fa-box mr-2"></i>Gestionar Productos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
