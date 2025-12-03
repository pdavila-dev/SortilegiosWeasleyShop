<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PedidoController extends Controller
{
    public function index(Request $request): View
    {
        $query = Pedido::with(['user.registrado', 'user.noRegistrado', 'items.producto'])
            ->latest('fecha_pedido');

        $pedidos = $query->paginate(15)->appends($request->query());

        $totalPedidos = Pedido::count();
        $totalIngresos = Pedido::sum('total_pedido');

        return view('admin.pedidos.index', compact('pedidos', 'totalPedidos', 'totalIngresos'));
    }

    public function show(Pedido $pedido): View
    {
        $pedido->load([
            'user.registrado',
            'user.noRegistrado',
            'items.producto.descripcion'
        ]);

        return view('admin.pedidos.show', compact('pedido'));
    }
}

