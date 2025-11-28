<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\ClienteNoRegistrado;
use App\Models\ClienteRegistrado;
use App\Models\Pedido;
use App\Models\LineaPedido;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class VerificaController extends Controller
{
    public function create()
    {
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('success', 'Tu cesta está vacía.');
        }

        $productos = Producto::with('descripcion')
            ->whereIn('id_producto', array_keys($carrito))
            ->get();

        $items = $productos->map(function (Producto $producto) use ($carrito) {
            $cantidad = $carrito[$producto->id_producto];
            $precioUnitario = $producto->oferta ? ($producto->precio_oferta ?? $producto->precio_actual) : $producto->precio_actual;

            return [
                'producto' => $producto,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'total' => $precioUnitario * $cantidad,
            ];
        });

        $total = $items->sum('total');

        return view('verificar.create', compact('items', 'total'));
    }

    public function store(Request $request)
    {
        $carrito = Session::get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('carrito.index')->with('success', 'Tu cesta está vacía.');
        }

        $data = $request->validate([
            'correo_contacto' => ['required', 'email'],
            'nombre_contacto' => ['required', 'string', 'max:255'],
            'direccion_envio' => ['required', 'string', 'max:500'],
            'crear_cuenta' => ['nullable', 'boolean'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        if ($request->boolean('crear_cuenta') && blank($data['password'])) {
            $data['password'] = Str::random(12);
        }

        $cliente = $this->resolveCliente($data, $request->boolean('crear_cuenta'));

        $productos = Producto::whereIn('id_producto', array_keys($carrito))->get();
        $total = 0;

        $pedido = Pedido::create([
            'id_cliente' => $cliente->id_cliente,
            'nombre_contacto' => $data['nombre_contacto'],
            'correo_contacto' => $data['correo_contacto'],
            'direccion_envio' => $data['direccion_envio'],
            'total_pedido' => 0,
            'fecha_pedido' => now()->toDateString(),
            'hora_inicio_compra' => now()->toTimeString(),
            'hora_fin_compra' => now()->toTimeString(),
            'ip_compra' => $request->ip(),
        ]);

        foreach ($productos as $producto) {
            $cantidad = $carrito[$producto->id_producto];
            $precioUnitario = $producto->oferta ? ($producto->precio_oferta ?? $producto->precio_actual) : $producto->precio_actual;
            $lineaTotal = $precioUnitario * $cantidad;
            $total += $lineaTotal;

            LineaPedido::create([
                'id_pedido' => $pedido->id_pedido,
                'id_producto' => $producto->id_producto,
                'descripcion_producto' => optional($producto->descripcion)->descripcion_producto,
                'cantidad' => $cantidad,
                'precio_unitario' => $precioUnitario,
                'descuento' => 0,
                'precio_final' => $lineaTotal,
            ]);
        }

        $pedido->update(['total_pedido' => $total]);
        Session::forget('carrito');

        return redirect()->route('verificar.gracias', $pedido)->with('success', 'Compra realizada con éxito.');
    }

    public function gracias(Pedido $pedido)
    {
        return view('verificar.gracias', compact('pedido'));
    }

    protected function resolveCliente(array $data, bool $createAccount): Cliente
    {
        $clienteRegistrado = ClienteRegistrado::where('correo_electronico', $data['correo_contacto'])->first();
        if ($clienteRegistrado) {
            return $clienteRegistrado->cliente;
        }

        $cliente = Cliente::create();

        if ($createAccount) {
            ClienteRegistrado::create([
                'id_cliente' => $cliente->id_cliente,
                'nombre' => $data['nombre_contacto'],
                'apellidos' => $data['nombre_contacto'],
                'correo_electronico' => $data['correo_contacto'],
                'contrasena' => Hash::make($data['password'] ?? Str::random(10)),
                'fecha_primera_compra' => now()->toDateString(),
                'fecha_ultima_compra' => now()->toDateString(),
            ]);
        } else {
            ClienteNoRegistrado::create([
                'id_cliente' => $cliente->id_cliente,
            ]);
        }

        return $cliente;
    }
}

