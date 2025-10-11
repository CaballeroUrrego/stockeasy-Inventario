<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    public function run(): void
    {
        $proveedores = [
            ['nombre' => 'Distribuidora Norte', 'nit' => '900123456', 'telefono' => '3123456789'],
            ['nombre' => 'Comercial Andina', 'nit' => '901987654', 'telefono' => '3012345678'],
        ];

        foreach ($proveedores as $data) {
            Proveedor::firstOrCreate(['nit' => $data['nit']], $data);
        }
    }
}
