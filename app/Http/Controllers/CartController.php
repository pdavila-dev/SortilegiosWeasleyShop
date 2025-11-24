<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $productos = Producto::with('descripcion')
            ->whereIn('id_producto', array_keys($cart))
            ->get();

        $items = $productos->map(function (Producto $producto) use ($cart) {
            $quantity = $cart[$producto->id_producto] ?? 0;
            $unitPrice = $producto->oferta ? ($producto->preu_oferta ?? $producto->precio_actual) : $producto->precio_actual;

            return [
                'producto' => $producto,
                'quantity' => $quantity,
                'total' => $unitPrice * $quantity,
                'unit_price' => $unitPrice,
            ];
        });

        $total = $items->sum('total');

        return view('cart.index', compact('items', 'total'));
    }

    public function store(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'quantity' => ['sometimes', 'integer', 'min:1', 'max:99'],
        ]);

        $quantity = $data['quantity'] ?? 1;
        $cart = Session::get('cart', []);

        $cart[$producto->id_producto] = ($cart[$producto->id_producto] ?? 0) + $quantity;

        Session::put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado a la cesta.');
    }

    public function update(Request $request, Producto $producto)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = Session::get('cart', []);
        $cart[$producto->id_producto] = $data['quantity'];
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Cantidad actualizada.');
    }

    public function destroy(Producto $producto)
    {
        $cart = Session::get('cart', []);
        unset($cart[$producto->id_producto]);
        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Producto eliminado de la cesta.');
    }
}

