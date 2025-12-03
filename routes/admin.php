<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\CategoriaController;

Route::name('admin.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('productos', ProductoController::class)
        ->except(['show']);

    Route::resource('pedidos', PedidoController::class)
        ->only(['index', 'show']);

    Route::resource('categorias', CategoriaController::class);
});
