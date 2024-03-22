<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transportes;

class TransportesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transportes = [
            'Avion',
            'Coche',
            'Tren',
            'Barco',
            'Autobús'
        ];

        foreach ($transportes as $transporte) {
            Transportes::create(['nombre' => $transporte]);
        }
    }
}
