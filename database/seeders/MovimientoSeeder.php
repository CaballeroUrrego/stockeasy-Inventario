<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movimiento;
use App\Models\User;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class MovimientoSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener usuario existente o crear uno
        $usuario = User::firstOrCreate(
            ['email' => 'usuario@stock.com'],
            [
                'name' => 'Usuario Stock',
                'password' => bcrypt('secret'),
                'cedula' => '123456789',
                'id_rol' => 1
            ]
        );

        // Obtener la primera categoría y proveedor existentes
        $categoria = Categoria::first();
        $proveedor = Proveedor::first();
        if (!$categoria || !$proveedor) return;

        // Obtener o crear producto asociado
        $producto = Producto::firstOrCreate(
            ['nombre' => 'Monitor LED'],
            [
                'precio' => 300000,
                'stock' => 10,
                'id_categoria' => $categoria->id_categoria,
                'id_proveedor' => $proveedor->id_proveedor,
            ]
        );

        // Crear movimiento si aún no existe
        Movimiento::firstOrCreate([
            'id_usuario' => $usuario->id,
            'id_producto' => $producto->id_producto,
            'cantidad' => 3,
            'tipo' => 'entrada',
            'fecha' => now(),
        ]);
    }
}
