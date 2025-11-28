<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = Session::get('carrito', []);
        $productos = Producto::with('descripcion')
            ->whereIn('id_producto', array_keys($carrito))
            ->get();

        $items = $productos->map(function (Producto $producto) use ($carrito) {
            $cantidad = $carrito[$producto->id_producto] ?? 0;
            $precioUnitario = $producto->oferta ? ($producto->precio_oferta ?? $producto->precio_actual) : $producto->precio_actual;

            return [
                'producto' => $producto,
                'cantidad' => $cantidad,
                'total' => $precioUnitario * $cantidad,
                'precio_unitario' => $precioUnitario,
            ];
        });

        $total = $items->sum('total');

        return view('carrito.index', compact('items', 'total'));
    }

    public function store(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'cantidad' => ['sometimes', 'integer', 'min:1', 'max:99'],
        ]);

        $cantidad = $data['cantidad'] ?? 1;
        $carrito = Session::get('carrito', []);

        $carrito[$producto->id_producto] = ($carrito[$producto->id_producto] ?? 0) + $cantidad;

        Session::put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado a la cesta.');
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'cantidad' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $carrito = Session::get('carrito', []);
        $carrito[$producto->id_producto] = $data['cantidad'];
        Session::put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Cantidad actualizada.');
    }

    public function destroy(Producto $producto)
    {
        $carrito = Session::get('carrito', []);
        unset($carrito[$producto->id_producto]);
        Session::put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto eliminado de la cesta.');
    }
}

