<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener la primera categoría y proveedor existentes o crearlos
        $categoria = Categoria::firstOrCreate(['nombre' => 'Tecnología']);
        $proveedor = Proveedor::firstOrCreate(
            ['nit' => '900123321'],
            [
                'nombre' => 'ProveedorTech',
                'telefono' => '3101234567',
            ]
        );

        // Verifica que existan antes de asignar productos
        if (!$categoria || !$proveedor) {
            dd("❌ Error: No hay categoría o proveedor disponibles.");
        }

        // Crear producto solo si existen las relaciones
        Producto::firstOrCreate(
            ['nombre' => 'Mouse Inalámbrico'],
            [
                'precio' => 50000,
                'stock' => 100,
                'id_categoria' => $categoria->id_categoria,
                'id_proveedor' => $proveedor->id_proveedor,
            ]
        );
    }
}
