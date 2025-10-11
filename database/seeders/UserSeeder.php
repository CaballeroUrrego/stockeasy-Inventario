<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Verificar si el usuario ya existe, y si no, crearlo
        // Verificar si el usuario ya existe, y si no, crearlo
        $admin = User::where('email', 'admin@example.com')->first();
        if (!$admin) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'cedula' => '123456789',
                'id_rol' => 1, // ID del rol administrador
            ]);
        }

        $vendedor = User::where('email', 'vendedor@example.com')->first();
        if (!$vendedor) {
            User::create([
                'name' => 'Vendedor User',
                'email' => 'vendedor@example.com',
                'password' => Hash::make('password'),
                'cedula' => '987654321',
                'id_rol' => 2, // ID del rol vendedor
            ]);
        }
    }
}
