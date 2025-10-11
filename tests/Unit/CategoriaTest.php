<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\CategoriaSeeder;
use Database\Seeders\ProductoSeeder;
use App\Models\Categoria;

class CategoriaTest extends TestCase
{
    use RefreshDatabase;

    public function test_categorias_se_pueden_insertar_desde_el_seeder(): void
    {
        $this->seed(CategoriaSeeder::class);

        // Verifica que hay al menos una categoría creada
        $this->assertGreaterThan(0, Categoria::count());

        // Si quieres verificar una en particular que venga en el seeder, está bien dejarlo
        $this->assertDatabaseHas('categorias', ['nombre' => 'Bebidas']);
    }

    public function test_relacion_con_productos(): void
    {
        $this->seed([
            CategoriaSeeder::class,
            ProductoSeeder::class,
        ]);

        // Obtenemos una categoría que tenga productos
        $categoria = Categoria::has('productos')->first();

        $this->assertNotNull($categoria, 'No se encontró una categoría con productos relacionados');
        $this->assertNotEmpty($categoria->productos, 'La categoría no tiene productos asociados');
    }
}
