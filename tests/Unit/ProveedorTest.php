<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\ProveedorSeeder;
use Database\Seeders\ProductoSeeder;
use App\Models\Proveedor;
use App\Models\Producto;

class ProveedorTest extends TestCase
{
    use RefreshDatabase;

    public function test_proveedores_se_pueden_insertar_desde_el_seeder(): void
    {
        $this->seed(ProveedorSeeder::class);

        $this->assertGreaterThan(0, Proveedor::count());
        $this->assertDatabaseHas('proveedores', ['telefono' => '3123456789']);
    }

    public function test_relacion_con_productos(): void
    {
        $this->seed([
            CategoriaSeeder::class,
            ProveedorSeeder::class,
            ProductoSeeder::class,
        ]);

        $proveedor = Proveedor::has('productos')->with('productos')->first();

        $this->assertNotNull($proveedor, 'No se encontró un proveedor con productos relacionados');
        $this->assertGreaterThan(0, $proveedor->productos->count());

        $this->assertInstanceOf(Producto::class, $proveedor->productos->first());
    }
}
