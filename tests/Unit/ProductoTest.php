<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\ProveedorSeeder;
use Database\Seeders\ProductoSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VentaSeeder;
use Database\Seeders\DetalleVentaSeeder;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;

class ProductoTest extends TestCase
{
    use RefreshDatabase;

    public function test_productos_se_crean_con_exito(): void
    {
        // Ejecutamos los seeders necesarios
        $this->seed([
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
        ]);

        // Verificamos que los productos se hayan creado correctamente
        $this->assertGreaterThan(0, Producto::count());
        $this->assertDatabaseHas('productos', [
            'precio' => 50000,
        ]);
    }

    public function test_relacion_con_categoria_y_proveedor(): void
    {
        // Ejecutamos los seeders necesarios
        $this->seed([
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
        ]);

        // Recuperamos un producto con las relaciones
        $producto = Producto::with(['categoria', 'proveedor'])->first();

        // Verificamos que las relaciones existen
        $this->assertNotNull($producto);
        $this->assertNotNull($producto->categoria, 'El producto no tiene categoría asociada');
        $this->assertNotNull($producto->proveedor, 'El producto no tiene proveedor asociado');

        // Verificamos que las relaciones son del tipo correcto
        $this->assertInstanceOf(Categoria::class, $producto->categoria);
        $this->assertInstanceOf(Proveedor::class, $producto->proveedor);
    }

}
