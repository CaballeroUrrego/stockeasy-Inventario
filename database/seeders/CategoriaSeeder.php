<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::firstOrCreate(['nombre' => 'Bebidas']);
        Categoria::firstOrCreate(['nombre' => 'Snacks']);
        Categoria::firstOrCreate(['nombre' => 'Limpieza']);
    }
}
