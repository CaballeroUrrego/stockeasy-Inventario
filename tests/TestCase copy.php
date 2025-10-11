<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // Método de configuración antes de cada prueba
    protected function setUp(): void
    {
        parent::setUp();

        // Desactivar las restricciones de claves foráneas solo en el entorno de pruebas
        if (app()->environment('testing')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        // Ejecutar las migraciones frescas y los seeders
        Artisan::call('migrate:fresh', ['--seed' => true]);

        // Reactivar las restricciones de claves foráneas después de ejecutar las migraciones y seeders
        if (app()->environment('testing')) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }

    // Método de limpieza después de cada prueba
    protected function tearDown(): void
    {
        parent::tearDown();
    }
}
