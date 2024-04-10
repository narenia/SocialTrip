<?php

namespace Database\Seeders;

use App\Models\Viajes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viajes = [
            ['fecha_inicio' => '2024-12-01', 'fecha_final' => '2024-12-14','transporte_id' => 1,'estados_viajes_id' => 1, 'usuario_id'=>1,'ciudad_salida_id'=>1,'ciudad_destino_id'=>6,'recomendado'=>1],
            ['fecha_inicio' => '2024-01-01', 'fecha_final' => '2024-01-19','transporte_id' => 2,'estados_viajes_id' => 3, 'usuario_id'=>2,'ciudad_salida_id'=>2,'ciudad_destino_id'=>7,'recomendado'=>1],
            ['fecha_inicio' => '2024-01-21', 'fecha_final' => '2024-02-08','transporte_id' => 3,'estados_viajes_id' => 1, 'usuario_id'=>3,'ciudad_salida_id'=>3,'ciudad_destino_id'=>8,'recomendado'=>1],
            ['fecha_inicio' => '2024-07-01', 'fecha_final' => '2024-12-14','transporte_id' => 4,'estados_viajes_id' => 2, 'usuario_id'=>4,'ciudad_salida_id'=>4,'ciudad_destino_id'=>9,'recomendado'=>1],
            ['fecha_inicio' => '2025-10-01', 'fecha_final' => '2025-11-14','transporte_id' => 1,'estados_viajes_id' => 4, 'usuario_id'=>4,'ciudad_salida_id'=>4,'ciudad_destino_id'=>10,'recomendado'=>1],

        ];

        foreach ($viajes as $viaje) {
            Viajes::create($viaje);
        }
    }
}
