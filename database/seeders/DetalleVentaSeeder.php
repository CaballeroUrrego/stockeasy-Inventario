<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;
use App\Models\Producto;
use App\Models\DetalleVenta;
use App\Models\Categoria;
use App\Models\Proveedor;

class DetalleVentaSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener la primera venta existente
        $venta = Venta::first();
        if (!$venta) return;

        // Obtener la primera categoría y proveedor existentes
        $categoria = Categoria::first();
        $proveedor = Proveedor::first();
        if (!$categoria || !$proveedor) return;

        // Crear o seleccionar el primer producto existente
        $producto = Producto::firstOrCreate(
            ['nombre' => 'Mouse Inalámbrico'],
            [
                'precio' => 50000,
                'stock' => 100,
                'id_categoria' => $categoria->id_categoria,
                'id_proveedor' => $proveedor->id_proveedor,
            ]
        );

        // Crear detalle de venta
        DetalleVenta::firstOrCreate(
            [
                'id_venta' => $venta->id_venta,
                'id_producto' => $producto->id_producto,
            ],
            [
                'cantidad' => 2,
                'precio_unitario' => $producto->precio,
            ]
        );
    }
}
