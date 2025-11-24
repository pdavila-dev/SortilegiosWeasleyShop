<?php

namespace Database\Factories;

use App\Models\DescTipProd;
use App\Models\TipoProducto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TipoProducto>
 */
class TipoProductoFactory extends Factory
{
    protected $model = TipoProducto::class;

    public function definition(): array
    {
        $faker = fake('es_ES');

        return [
            'descuento' => $faker->randomFloat(2, 0, 35),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (TipoProducto $tipo) {
            DescTipProd::create([
                'id_tipo_producto' => $tipo->id_tipo_producto,
                'descripcion_tipo_producto' => fake('es_ES')->unique()->sentence(3),
            ]);
        });
    }
}

