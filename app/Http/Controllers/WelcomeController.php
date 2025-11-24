<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $categorias = TipoProducto::with(['detalle', 'productos' => function ($query) {
            $query->with('descripcion')
                ->latest('id_producto');
        }])->get();

        return view('welcome', compact('categorias'));
    }
}

