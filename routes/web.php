<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\VerificaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index'])->name('landing');
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('/categorias/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito.index');
Route::post('/carrito/{producto}', [CarritoController::class, 'store'])->name('carrito.store');
Route::patch('/carrito/{producto}', [CarritoController::class, 'update'])->name('carrito.update');
Route::delete('/carrito/{producto}', [CarritoController::class, 'destroy'])->name('carrito.destroy');
Route::get('/verificar', [VerificaController::class, 'create'])->name('verificar.create');
Route::post('/verificar', [VerificaController::class, 'store'])->name('verificar.store');
Route::get('/verificar/gracias/{order}', [VerificaController::class, 'gracias'])->name('verificar.gracias');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
