<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Definir los roles
        $roles = [
            ['nombre' => 'admin'],
            ['nombre' => 'vendedor'],
        ];

        // Insertar los roles directamente
        DB::table('roles')->insertOrIgnore($roles);
    }
}

