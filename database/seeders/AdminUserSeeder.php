<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Usuario administrador predefinido para acceder al panel de administración.
     * Credenciales:
     * - Email: admin@sortilegiosweasley.com
     * - Contraseña: admin123
     */
    public function run(): void
    {
        // Verificar si ya existe el usuario administrador
        $admin = User::where('email', 'admin@sortilegiosweasley.com')->first();

        if (!$admin) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@sortilegiosweasley.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]);

            $this->command->info('Usuario administrador creado exitosamente.');
            $this->command->info('Email: admin@sortilegiosweasley.com');
            $this->command->info('Contraseña: admin123');
        } else {
            $this->command->warn('El usuario administrador ya existe.');
        }
    }
}

