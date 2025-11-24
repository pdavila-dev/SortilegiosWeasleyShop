<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipoProducto;
use App\Models\Producto;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categorias = [
            [
                'nombre' => 'Dulces Explosivos',
                'descuento' => 12.5,
                'imagen' => 'https://images.unsplash.com/photo-1505394033641-40c6ad1178d7',
                'productos' => [
                    'Caramelos Brazalete Detonador',
                    'Algodón de Azúcar Lumos',
                    'Bombones Piroclásticos de Fuego Frío',
                ],
            ],
            [
                'nombre' => 'Travesuras Impecables',
                'descuento' => 8,
                'imagen' => 'https://images.unsplash.com/photo-1470337458703-46ad1756a187',
                'productos' => [
                    'Chicles Orejones Extendibles',
                    'Pastillas Pegarostas',
                    'Barras de Risa Incontenible',
                ],
            ],
            [
                'nombre' => 'Defensa Anti-Prefecto',
                'descuento' => 5,
                'imagen' => 'https://images.unsplash.com/photo-1522780209446-8f0b914b51c9',
                'productos' => [
                    'Tarros Niebla Invisible',
                    'Pelotas Nauseabundas Deluxe',
                    'Grenadas de Bruma Mofletuda',
                ],
            ],
        ];

        foreach ($categorias as $categoria) {
            $tipo = TipoProducto::factory()
                ->categoria($categoria['nombre'])
                ->create([
                    'slug' => Str::slug($categoria['nombre']),
                    'imagen_url' => $categoria['imagen'],
                    'descuento' => $categoria['descuento'],
                ]);

            foreach ($categoria['productos'] as $nombreProducto) {
                $producto = Producto::factory()
                    ->nombreMagico($nombreProducto)
                    ->create();

                $producto->tipos()->sync([$tipo->id_tipo_producto]);
            }
        }
    }
}
