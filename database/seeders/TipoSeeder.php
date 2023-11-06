<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tip_tipo_docs')->insert(
            [
                'TIP_NOMBRE' => 'CONTRATO',
                'TIP_PREFIJO' => 'CONT',
            ],
            [
                'TIP_NOMBRE' => 'CARTA',
                'TIP_PREFIJO' => 'CART',
            ],
            [
                'TIP_NOMBRE' => 'LIQUIDACION',
                'TIP_PREFIJO' => 'LIQ',
            ],
            [
                'TIP_NOMBRE' => 'FORMATO HORAS EXTRA',
                'TIP_PREFIJO' => 'FH',
            ],
            [
                'TIP_NOMBRE' => 'FINALIZACION DE CONTRATO',
                'TIP_PREFIJO' => 'FN',
            ],
        );
    }
}
