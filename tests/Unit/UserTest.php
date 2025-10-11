<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Verificar que los usuarios se insertan correctamente.
     *
     * @return void
     */
    public function test_users_are_inserted_correctly()
    {
        // Insertar roles manualmente en la prueba
        \DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'admin'],
            ['id' => 2, 'nombre' => 'vendedor'],
        ]);

        // Ejecutar el seeder de usuarios
        $this->seed(\Database\Seeders\UserSeeder::class);

        // Verificar que los usuarios 'admin@example.com' y 'vendedor@example.com' existen en la base de datos
        $this->assertDatabaseHas('users', [
            'email' => 'admin@example.com',
            'name' => 'Admin User',
        ]);
        $this->assertDatabaseHas('users', [
            'email' => 'vendedor@example.com',
            'name' => 'Vendedor User',
        ]);
    }

    /**
     * Verificar que los usuarios no se dupliquen si se vuelve a ejecutar el seeder.
     *
     * @return void
     */
    public function test_users_are_not_duplicated()
    {
        // Insertar roles manualmente en la prueba
        \DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'admin'],
            ['id' => 2, 'nombre' => 'vendedor'],
        ]);

        // Ejecutar el seeder de usuarios dos veces
        $this->seed(\Database\Seeders\UserSeeder::class);
        $this->seed(\Database\Seeders\UserSeeder::class);

        // Verificar que solo existen dos usuarios
        $usersCount = User::count();
        $this->assertEquals(2, $usersCount);
    }

    /**
     * Verificar que las contraseñas de los usuarios estén correctamente encriptadas.
     *
     * @return void
     */
    public function test_passwords_are_encrypted()
    {
        // Insertar roles manualmente en la prueba
        \DB::table('roles')->insert([
            ['id' => 1, 'nombre' => 'admin'],
            ['id' => 2, 'nombre' => 'vendedor'],
        ]);

        // Ejecutar el seeder de usuarios
        $this->seed(\Database\Seeders\UserSeeder::class);

        // Obtener el usuario admin
        $user = User::where('email', 'admin@example.com')->first();

        // Verificar que la contraseña en la base de datos está encriptada (no debe coincidir con la contraseña original)
        $this->assertNotEquals('password', $user->password);
        $this->assertTrue(Hash::check('password', $user->password));
    }
}
