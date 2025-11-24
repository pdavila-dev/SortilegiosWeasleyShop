<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductoController;

Route::name('admin.')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('productos', ProductoController::class)
        ->except(['show']);
});
