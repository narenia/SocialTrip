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
            'ver-estado_viaje',
            'crear-estado_viaje',
            'editar-estado_viaje',
            'borrar-estado_viaje',
            //Tabla Notificaciones
            'ver-notificacion',
            'crear-notificacion',
            'editar-notificacion',
            'borrar-notificacion',
            //Tabla Albumes
            'ver-album',
            'crear-album',
            'editar-album',
            'borrar-album',
            //Tabla Viajes
            'ver-viaje',
            'crear-viaje',
            'editar-viaje',
            'borrar-viaje',
            //Tabla Usuarios
            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
            //Tabla Users
            'ver-user',
            'crear-user',
            'editar-user',
            'borrar-user',
            //Tabla Valoraciones
            'ver-valoracion',
            'crear-valoracion',
            'editar-valoracion',
            'borrar-valoracion',
            //Tabla Posts
            'ver-post',
            'crear-post',
            'editar-post',
            'borrar-post',
            //Tabla Comentarios
            'ver-comentario',
            'crear-comentario',
            'editar-comentario',
            'borrar-comentario',
            //Tabla Imagenes
            'ver-imagen',
            'crear-imagen',
            'editar-imagen',
            'borrar-imagen',
            //Tabla amistad
            'ver-amistad',
            'crear-amistad',
            'editar-amistad',
            'borrar-amistad',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
