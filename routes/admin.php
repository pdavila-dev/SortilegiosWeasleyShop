<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('/home', [HomeController::class, 'index'])->name('admin.home');
