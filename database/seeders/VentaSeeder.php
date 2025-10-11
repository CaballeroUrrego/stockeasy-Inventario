<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;
use App\Models\User;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class VentaSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener el primer usuario existente
        $usuario = User::first(); // Obtiene el primer usuario

        // Asegurar que existen categoría y proveedor
        $categoria = Categoria::firstOrCreate(['nombre' => 'Tecnología']);
        $proveedor = Proveedor::firstOrCreate(
            ['nombre' => 'ProveedorTech'],
            [
                'nit' => '900123321',
                'telefono' => '3101234567',
            ]
        );

        // Asegurar que existen los productos
        $producto1 = Producto::firstOrCreate(
            ['nombre' => 'Mouse Inalámbrico'],
            [
                'precio' => 50000,
                'stock' => 100,
                'id_categoria' => $categoria->id_categoria,
                'id_proveedor' => $proveedor->id_proveedor,
            ]
        );

        $producto2 = Producto::firstOrCreate(
            ['nombre' => 'Teclado Mecánico'],
            [
                'precio' => 80000,
                'stock' => 50,
                'id_categoria' => $categoria->id_categoria,
                'id_proveedor' => $proveedor->id_proveedor,
            ]
        );

        // Crear la venta
        $venta = Venta::firstOrCreate(
            ['id_usuario' => $usuario->id, 'fecha' => now()->toDateString()],
            ['total' => 200000]
        );

        // Crear los detalles de venta
        DetalleVenta::firstOrCreate(
            ['id_venta' => $venta->id_venta, 'id_producto' => $producto1->id_producto],
            ['cantidad' => 2, 'precio_unitario' => $producto1->precio]
        );

        DetalleVenta::firstOrCreate(
            ['id_venta' => $venta->id_venta, 'id_producto' => $producto2->id_producto],
            ['cantidad' => 1, 'precio_unitario' => $producto2->precio]
        );
    }
}
