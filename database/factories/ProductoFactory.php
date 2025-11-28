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
            'precio_oferta' => $precioOferta,
            'stock_inicial' => $stockInicial,
            'stock_actual' => $faker->numberBetween(0, $stockInicial),
            'stock_notificacion' => $faker->numberBetween(1, 20),
            'imagen_url' => $faker->randomElement([
                'https://images.unsplash.com/photo-1470337458703-46ad1756a187?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1505394033641-40c6ad1178d7?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1498842812179-c81beecf902c?auto=format&fit=crop&w=900&q=80',
            ]),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Producto $producto) {
            $faker = fake('es_ES');
            $nombresMagicos = [
                'Caramelo Explosivo Weasley',
                'Gominola Orejona Extendible',
                'Pastillas Patas de Gorila',
                'Pelusa de Pantano Translúcida',
                'Chicle Sangre de Dragón',
                'Bombones Fuegos Fatuos',
                'Tronadores de Pantalla Gigante',
                'Barras Ácidas Lumos',
                'Perfumes de Pluma de Augurey',
                'Muñecos de Moco Tenebroso',
            ];

            DescProd::create([
                'id_producto' => $producto->id_producto,
                'descripcion_producto' => $faker->randomElement($nombresMagicos) . ' - ' . $faker->sentence(8),
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

    public function nombreMagico(string $nombre): static
    {
        return $this->afterCreating(function (Producto $producto) use ($nombre) {
            $producto->descripcion()->updateOrCreate(
                ['id_producto' => $producto->id_producto],
                ['descripcion_producto' => $nombre]
            );
        });
    }
}

