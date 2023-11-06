<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProcesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pro_procesos')->insert(
            [
                'PRO_NOMBRE' => 'INSTALACION',
                'PRO_PREFIJO' => 'INS',
            ],
            [
                'PRO_NOMBRE' => 'INGENIERIA',
                'PRO_PREFIJO' => 'ING',
            ],
            [
                'PRO_NOMBRE' => 'DESARROLLO',
                'PRO_PREFIJO' => 'DES',
            ],
            [
                'PRO_NOMBRE' => 'ADMINISTRACION',
                'PRO_PREFIJO' => 'ADM',
            ],
            [
                'PRO_NOMBRE' => 'GESTION HUMANA',
                'PRO_PREFIJO' => 'GH',
            ],
            [
                'PRO_NOMBRE' => 'CONTABLE',
                'PRO_PREFIJO' => 'CTBL',
            ],
        );
    }
}
