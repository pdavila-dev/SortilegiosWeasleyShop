<?php

namespace Database\Factories;

use App\Models\DescProd;
use App\Models\Producto;
use App\Models\TipoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        $faker = fake('es_ES');

        $precio = $faker->randomFloat(2, 5, 500);
        $enOferta = $faker->boolean(35);
        $precioOferta = $enOferta
            ? $faker->randomFloat(2, max(1, $precio * 0.5), $precio * 0.95)
            : null;

        $stockInicial = $faker->numberBetween(10, 200);

        return [
            'precio_actual' => $precio,
            'oferta' => $enOferta,
            'preu_oferta' => $precioOferta,
            'stock_inicial' => $stockInicial,
            'stock_actual' => $faker->numberBetween(0, $stockInicial),
            'stock_notificacion' => $faker->numberBetween(1, 20),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Producto $producto) {
            DescProd::create([
                'id_producto' => $producto->id_producto,
                'descripcion_producto' => fake('es_ES')->sentence(10),
            ]);

            $tipos = TipoProducto::query()
                ->inRandomOrder()
                ->take(rand(1, 3))
                ->pluck('id_tipo_producto');

            if ($tipos->isEmpty()) {
                $tipos = TipoProducto::factory()
                    ->count(rand(1, 3))
                    ->create()
                    ->pluck('id_tipo_producto');
            }

            $producto->tipos()->sync($tipos instanceof Collection ? $tipos->all() : $tipos);
        });
    }
}

