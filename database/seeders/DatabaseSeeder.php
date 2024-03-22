<?php

namespace Database\Seeders;

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
    }
}
