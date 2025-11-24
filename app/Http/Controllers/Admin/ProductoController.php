<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DescProd;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductoController extends Controller
{
    public function index(): View
    {
        $productos = Producto::with(['descripcion', 'tipos.detalle'])
            ->latest('id_producto')
            ->paginate(10);

        return view('admin.productos.index', compact('productos'));
    }

    public function create(): View
    {
        return view('admin.productos.create', [
            'tipos' => $this->obtenerTiposDisponibles(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validarProducto($request);

        DB::transaction(function () use ($data) {
            $producto = Producto::create($data['producto']);

            DescProd::create([
                'id_producto' => $producto->id_producto,
                'descripcion_producto' => $data['descripcion_producto'],
            ]);

            if (!empty($data['tipo_productos'])) {
                $producto->tipos()->sync($data['tipo_productos']);
            }
        });

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto creado correctamente.');
    }

    public function edit(Producto $producto): View
    {
        $producto->load(['descripcion', 'tipos']);

        return view('admin.productos.edit', [
            'producto' => $producto,
            'tipos' => $this->obtenerTiposDisponibles(),
            'tiposSeleccionados' => $producto->tipos->pluck('id_tipo_producto')->all(),
        ]);
    }

    public function update(Request $request, Producto $producto): RedirectResponse
    {
        $data = $this->validarProducto($request, $producto);

        DB::transaction(function () use ($producto, $data) {
            $producto->update($data['producto']);

            $producto->descripcion()->updateOrCreate(
                ['id_producto' => $producto->id_producto],
                ['descripcion_producto' => $data['descripcion_producto']]
            );

            $producto->tipos()->sync($data['tipo_productos'] ?? []);
        });

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto): RedirectResponse
    {
        $producto->delete();

        return redirect()
            ->route('admin.productos.index')
            ->with('success', 'Producto eliminado.');
    }

    private function validarProducto(Request $request, ?Producto $producto = null): array
    {
        $validated = $request->validate([
            'precio_actual' => ['required', 'numeric', 'min:0'],
            'oferta' => ['nullable', 'boolean'],
            'preu_oferta' => ['nullable', 'numeric', 'min:0', 'required_if:oferta,1'],
            'stock_inicial' => ['required', 'integer', 'min:0'],
            'stock_actual' => ['required', 'integer', 'min:0'],
            'stock_notificacion' => ['required', 'integer', 'min:0'],
            'descripcion_producto' => ['required', 'string', 'max:255'],
            'tipo_productos' => ['nullable', 'array'],
            'tipo_productos.*' => ['exists:tipo_productos,id_tipo_producto'],
        ], [], [
            'descripcion_producto' => 'descripción',
            'tipo_productos' => 'tipos de producto',
        ]);

        $ofertaActiva = (bool) ($validated['oferta'] ?? false);

        return [
            'producto' => [
                'precio_actual' => $validated['precio_actual'],
                'oferta' => $ofertaActiva,
                'preu_oferta' => $ofertaActiva ? $validated['preu_oferta'] : null,
                'stock_inicial' => $validated['stock_inicial'],
                'stock_actual' => $validated['stock_actual'],
                'stock_notificacion' => $validated['stock_notificacion'],
            ],
            'descripcion_producto' => $validated['descripcion_producto'],
            'tipo_productos' => $validated['tipo_productos'] ?? [],
        ];
    }

    private function obtenerTiposDisponibles()
    {
        return TipoProducto::with('detalle')
            ->orderBy('id_tipo_producto')
            ->get();
    }
}

