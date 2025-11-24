@extends('layouts.app')

@section('subtitle', 'Editar producto')
@section('content_header_title', 'Productos')
@section('content_header_subtitle', 'Editar')

@section('content_body')
    <div class="card">
        <div class="card-header">
            <span class="card-title mb-0">Editar producto #{{ $producto->id_producto }}</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.productos.update', $producto) }}">
                @csrf
                @method('PUT')
                @include('admin.productos.partials.form', [
                    'producto' => $producto,
                    'tiposSeleccionados' => $tiposSeleccionados,
                ])
            </form>
        </div>
    </div>
@endsection

