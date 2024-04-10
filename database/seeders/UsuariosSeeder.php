<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuarios = [
            ['email' => 'naza@gmail.com', 'contrasenna' => '12345678' ,'tipo' => 1, 'fecha_nacimiento' => '2001-04-28','nombre' => 'Nazaret', 'apellidos' => 'Guirado Sánchez', 'nombre_usuario' => 'Narenia', 'dni' => '12345678A', 'ciudad_residencia' => 1, 'ciudad_nacimiento' => 9],
            ['email' => 'carlos@gmail.com', 'contrasenna' => '12345678' ,'tipo' => 1, 'fecha_nacimiento' => '1991-07-08','nombre' => 'Carlos', 'apellidos' => 'Nnang Suárez', 'nombre_usuario' => 'Serux', 'dni' => '12345678B', 'ciudad_residencia' => 5, 'ciudad_nacimiento' => 3],
            ['email' => 'drake@gmail.com', 'contrasenna' => '12345678' ,'tipo' => 1, 'fecha_nacimiento' => '2008-01-19','nombre' => 'Drake', 'apellidos' => 'Guirado Sánchez', 'nombre_usuario' => 'Xiaovit', 'dni' => '12345678C', 'ciudad_residencia' => 7, 'ciudad_nacimiento' => 4],
            ['email' => 'rocio@gmail.com', 'contrasenna' => '12345678' ,'tipo' => 1, 'fecha_nacimiento' => '1999-11-10','nombre' => 'Rocío', 'apellidos' => 'Rodríguez Sierra', 'nombre_usuario' => 'Xio', 'dni' => '12345678D', 'ciudad_residencia' => 2, 'ciudad_nacimiento' => 8],
        ];

        foreach ($usuarios as $usuario) {
            Usuarios::create($usuario);
        }
    }
}
