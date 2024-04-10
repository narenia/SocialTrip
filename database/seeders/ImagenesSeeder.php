<?php

namespace Database\Seeders;

use App\Models\Imagenes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imagenes = [
            ['ruta' => 'img1.jpg', 'album_id' => 1,'posts_id' => 1,'viajes_id' => 1],
            ['ruta' => 'img2.jpg', 'album_id' => 1,'posts_id' => 1,'viajes_id' => 1],
            ['ruta' => 'img3.jpg', 'album_id' => 1,'posts_id' => 1,'viajes_id' => 1],
            ['ruta' => 'img4.jpg', 'album_id' => 1,'posts_id' => 1,'viajes_id' => 1],
            ['ruta' => 'img5.jpg', 'album_id' => 1,'posts_id' => 1,'viajes_id' => 1],
        ];

        foreach ($imagenes as $imagen) {
            Imagenes::create($imagen);
        }
    }
}
