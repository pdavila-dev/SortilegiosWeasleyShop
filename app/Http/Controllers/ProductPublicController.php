<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductPublicController extends Controller
{
    public function show(Producto $producto)
    {
        $producto->load(['descripcion', 'tipos.detalle']);

        return view('products.show', [
            'producto' => $producto,
        ]);
    }
}

