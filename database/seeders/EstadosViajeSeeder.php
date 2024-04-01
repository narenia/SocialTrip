<?php

namespace Database\Seeders;

use App\Models\Estados_viaje;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estados = [
            'Planificado',
            'En curso',
            'Realizado',
            'Cancelado'
        ];

        foreach ($estados as $estado) {
            Estados_viaje::create(['nombre' => $estado]);
        }
    }
}
