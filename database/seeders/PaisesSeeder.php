<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paises;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paises = [
            'España',
            'Inglaterra',
            'Alemania',
            'Bélgica',
            'Estados Unidos',
            'Sudáfrica',
            'Japón',
            'China',
            'Filipinas',
            'Corea del Sur',
            'Países Bajos',
        ];

        foreach ($paises as $pais) {
            Paises::create(['nombre' => $pais]);
        }
    }
}
