<?php

namespace Database\Seeders;

use App\Models\Notificaciones;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $notificaciones = [
            ['tipo' => 'Alerta', 'estado' => 'No leída','fecha' => '2024-04-25','contenido' => 'asjadhaskjdhaksdhkajshd', 'usuario_id' => 2],
            ['tipo' => 'Amistad', 'estado' => 'Leída','fecha' => '2024-04-21',  'contenido' => 'asfsafsdfsdfdfsfdfsdfdsf', 'usuario_id' => 4],
            ['tipo' => 'Alerta', 'estado' => 'No leída','fecha' => '2024-04-21',  'contenido' => 'asffsdfsdfsdfsdfsdfsdfsdf', 'usuario_id' => 3],
            ['tipo' => 'Publicacion', 'estado' => 'Leída','fecha' => '2024-04-15',  'contenido' => 'asdasdasdasdasdasd', 'usuario_id' => 1],
        ];

        foreach ($notificaciones as $notificacion) {
            Notificaciones::create($notificacion);
        }
    }
}
