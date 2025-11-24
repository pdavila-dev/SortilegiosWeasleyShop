<?php

namespace App\Http\Controllers;

use App\Models\TipoProducto;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorias = TipoProducto::with('detalle')
            ->withCount('productos')
            ->get()
            ->sortBy(fn ($tipo) => optional($tipo->detalle)->descripcion_tipo_producto)
            ->values();

        return view('categories.index', compact('categorias'));
    }

    public function show(TipoProducto $categoria)
    {
        $categoria->load(['detalle', 'productos.descripcion']);

        $productos = $categoria->productos()
            ->with('descripcion')
            ->paginate(9);

        return view('categories.show', [
            'categoria' => $categoria,
            'productos' => $productos,
        ]);
    }
}

