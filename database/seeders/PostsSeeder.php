<?php

namespace Database\Seeders;

use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = [
            ['titulo' => 'Venecia 2021', 'contenido' => 'hola','usuario_id' => 1,'viajes_id' => 1],

        ];

        foreach ($posts as $post) {
            Posts::create($post);
        }
    }
}
