<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleTest extends TestCase
{
    use RefreshDatabase; // Para resetear la base de datos después de cada prueba

    /**
     * Verificar que los roles se insertaron correctamente.
     *
     * @return void
     */
    public function test_roles_are_inserted_correctly()
    {
        // Ejecutar el seeder
        $this->seed(\Database\Seeders\RoleSeeder::class);

        // Verificar que los roles 'admin' y 'vendedor' existen en la base de datos
        $this->assertDatabaseHas('roles', ['nombre' => 'admin']);
        $this->assertDatabaseHas('roles', ['nombre' => 'vendedor']);
    }

    /**
     * Verificar que no se dupliquen los roles si se vuelve a ejecutar el seeder.
     *
     * @return void
     */
    public function test_roles_are_not_duplicated()
    {
        // Ejecutar el seeder dos veces
        $this->seed(\Database\Seeders\RoleSeeder::class);
        $this->seed(\Database\Seeders\RoleSeeder::class);

        // Verificar que solo existen dos roles
        $rolesCount = DB::table('roles')->count();
        $this->assertEquals(2, $rolesCount);
    }
}
