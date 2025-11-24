@extends('layouts.app')

@section('subtitle', 'Nuevo producto')
@section('content_header_title', 'Productos')
@section('content_header_subtitle', 'Crear')

@section('content_body')
    <div class="card">
        <div class="card-header">
            <span class="card-title mb-0">Registrar producto</span>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.productos.store') }}">
                @csrf
                @include('admin.productos.partials.form')
            </form>
        </div>
    </div>
@endsection

