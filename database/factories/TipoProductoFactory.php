<?php

namespace Database\Factories;

use App\Models\DescTipProd;
use App\Models\TipoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<TipoProducto>
 */
class TipoProductoFactory extends Factory
{
    protected $model = TipoProducto::class;

    public function definition(): array
    {
        $faker = fake('es_ES');

        $nombre = fake('es_ES')->unique()->words(2, true);

        return [
            'slug' => Str::slug($nombre . '-' . $this->faker->unique()->randomNumber(3)),
            'imagen_url' => fake()->randomElement([
                'https://images.unsplash.com/photo-1504674900247-0877df9cc836',
                'https://images.unsplash.com/photo-1504754524776-8f4f37790ca0',
                'https://images.unsplash.com/photo-1470337458703-46ad1756a187',
                'https://images.unsplash.com/photo-1526089270286-8c963c1c0d1c',
            ]),
            'descuento' => $faker->randomFloat(2, 0, 35),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (TipoProducto $tipo) {
            $descripcion = fake('es_ES')->unique()->sentence(3);

            $tipo->detalle()->updateOrCreate(
                ['id_tipo_producto' => $tipo->id_tipo_producto],
                ['descripcion_tipo_producto' => $descripcion]
            );
        });
    }

    public function categoria(string $descripcion): static
    {
        return $this->afterCreating(function (TipoProducto $tipo) use ($descripcion) {
            $tipo->detalle()->updateOrCreate(
                ['id_tipo_producto' => $tipo->id_tipo_producto],
                ['descripcion_tipo_producto' => $descripcion]
            );
        });
    }
}

