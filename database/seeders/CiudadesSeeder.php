<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ciudades;

class CiudadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $ciudades = [
            ['nombre' => 'Madrid', 'pais_id' => 1],
            ['nombre' => 'Londres', 'pais_id' => 2],
            ['nombre' => 'Frankfurt', 'pais_id' => 3],
            ['nombre' => 'Bruselas', 'pais_id' => 4],
            ['nombre' => 'Miami', 'pais_id' => 5],
            ['nombre' => 'Durban', 'pais_id' => 6],
            ['nombre' => 'Tokyo', 'pais_id' => 7],
            ['nombre' => 'Shangái', 'pais_id' => 8],
            ['nombre' => 'Manila', 'pais_id' =>9],
            ['nombre' => 'Seúl', 'pais_id' => 10],
            ['nombre' => 'Ámsterdam', 'pais_id' => 11],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudades::create($ciudad);
        }
    }
}
