<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoProducto;
use App\Models\DescTipProd;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(): View
    {
        $categorias = TipoProducto::with('detalle')
            ->withCount('productos')
            ->orderBy('id_tipo_producto')
            ->get();

        return view('admin.categorias.index', compact('categorias'));
    }

    public function create(): View
    {
        return view('admin.categorias.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'descripcion_tipo_producto' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tipo_productos,slug'],
            'descuento' => ['required', 'numeric', 'min:0', 'max:100'],
            'imagen_url' => ['nullable', 'string', 'max:500'],
        ], [], [
            'descripcion_tipo_producto' => 'descripción',
            'imagen_url' => 'URL de imagen',
        ]);

        DB::transaction(function () use ($validated) {
            $categoria = TipoProducto::create([
                'slug' => $validated['slug'],
                'descuento' => $validated['descuento'],
                'imagen_url' => $validated['imagen_url'] ?? null,
            ]);

            DescTipProd::create([
                'id_tipo_producto' => $categoria->id_tipo_producto,
                'descripcion_tipo_producto' => $validated['descripcion_tipo_producto'],
            ]);
        });

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function edit(TipoProducto $categoria): View
    {
        $categoria->load('detalle');

        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(Request $request, TipoProducto $categoria): RedirectResponse
    {
        $validated = $request->validate([
            'descripcion_tipo_producto' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:tipo_productos,slug,' . $categoria->id_tipo_producto . ',id_tipo_producto'],
            'descuento' => ['required', 'numeric', 'min:0', 'max:100'],
            'imagen_url' => ['nullable', 'string', 'max:500'],
        ], [], [
            'descripcion_tipo_producto' => 'descripción',
            'imagen_url' => 'URL de imagen',
        ]);

        DB::transaction(function () use ($categoria, $validated) {
            $categoria->update([
                'slug' => $validated['slug'],
                'descuento' => $validated['descuento'],
                'imagen_url' => $validated['imagen_url'] ?? null,
            ]);

            $categoria->detalle()->updateOrCreate(
                ['id_tipo_producto' => $categoria->id_tipo_producto],
                ['descripcion_tipo_producto' => $validated['descripcion_tipo_producto']]
            );
        });

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy(TipoProducto $categoria): RedirectResponse
    {
        if ($categoria->productos()->count() > 0) {
            return redirect()
                ->route('admin.categorias.index')
                ->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
        }

        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}

