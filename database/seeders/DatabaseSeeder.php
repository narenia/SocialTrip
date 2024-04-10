<?php

namespace Database\Seeders;

use App\Models\Imagenes;
use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeederTablaPermisos::class);
        $this->call(SuperAdminSeeder::class);
        $this->call(TransportesSeeder::class);
        $this->call(PaisesSeeder::class);
        $this->call(CiudadesSeeder::class);
        $this->call(EstadosViajeSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(NotificacionesSeeder::class);
        $this->call(AlbumesSeeder::class);
        $this->call(ViajesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(ImagenesSeeder::class);
    }
}
