<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\TipoProducto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Estadísticas generales
        $totalPedidos = Pedido::count();
        $totalIngresos = Pedido::sum('total_pedido');
        $totalProductos = Producto::count();
        $totalCategorias = TipoProducto::count();
        $totalClientes = Cliente::count();
        $clientesRegistrados = Cliente::whereHas('registrado')->count();
        $clientesNoRegistrados = Cliente::whereHas('noRegistrado')->count();

        // Pedidos recientes
        $pedidosRecientes = Pedido::with(['user.registrado', 'user.noRegistrado'])
            ->latest('fecha_pedido')
            ->limit(5)
            ->get();

        // Ingresos por mes (últimos 6 meses)
        $ingresosPorMes = Pedido::selectRaw('DATE_FORMAT(fecha_pedido, "%Y-%m") as mes, SUM(total_pedido) as total')
            ->where('fecha_pedido', '>=', now()->subMonths(6))
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        return view('admin.index', compact(
            'totalPedidos',
            'totalIngresos',
            'totalProductos',
            'totalCategorias',
            'totalClientes',
            'clientesRegistrados',
            'clientesNoRegistrados',
            'pedidosRecientes',
            'ingresosPorMes'
        ));
    }
}
