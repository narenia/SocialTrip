<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//SPATIE
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Tabla Roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',
            //Tabla Blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',
            //Tabla Paises
            'ver-pais',
            'crear-pais',
            'editar-pais',
            'borrar-pais',
            //Tabla Ciudades
            'ver-ciudad',
            'crear-ciudad',
            'editar-ciudad',
            'borrar-ciudad',
            //Tabla Transportes
            'ver-transporte',
            'crear-transporte',
            'editar-transporte',
            'borrar-transporte',
            //Tabla estados-viaje
            'ver-estados',
            'crear-estados',
            'editar-estados',
            'borrar-estados',

        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
