<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Albumes;
class AlbumesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albumes = [
            ['nombre' => 'Venecia 2021', 'usuario_id' => 1],
            ['nombre' => 'Alemania 2024', 'usuario_id' => 4],
            ['nombre' => 'Tarragona 2020', 'usuario_id' => 3],
            ['nombre' => 'Lisboa 2023', 'usuario_id' => 2],
        ];

        foreach ($albumes as $album) {
            Albumes::create($album);
        }
    }
}
