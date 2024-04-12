<?php

namespace App\Http\Controllers;

use App\Models\Amistades;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmistadApiController extends Controller
{

    public function solicitarAmistad(Request $request)
    {
        $usuario1_id = Auth::id();
        $usuario2_id = $request->input('usuario2_id');

        $solicitudExistente = Amistades::where('usuario1_id', $usuario1_id)
            ->where('usuario2_id', $usuario2_id)
            ->orWhere(function ($query) use ($usuario1_id, $usuario2_id) {
                $query->where('usuario1_id', $usuario2_id)
                    ->where('usuario2_id', $usuario1_id);
            })
            ->exists();

        if ($solicitudExistente) {
            return response()->json(['message' => 'Ya existe una solicitud de amistad entre estos usuarios']);
        }

        Amistades::create([
            'usuario1_id' => $usuario1_id,
            'usuario2_id' => $usuario2_id,
            'estado' => 'Pendiente'
        ]);

        return response()->json(['message' => 'Solicitud de amistad enviada']);
    }

    public function aceptarSolicitudAmistad($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Solicitud de amistad no encontrada']);
        }

        $amistad->update(['estado' => 'Aceptada']);

        return response()->json(['message' => 'Solicitud de amistad aceptada']);
    }

    public function rechazarSolicitudAmistad($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Solicitud de amistad no encontrada']);
        }

        $amistad->delete();

        return response()->json(['message' => 'Solicitud de amistad rechazada']);
    }

    public function borrarAmigo($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Amistad no encontrada']);
        }

        $amistad->delete();

        return response()->json(['message' => 'Amistad eliminada correctamente']);
    }
    public function buscarAmigo(Request $request)
    {
        $terminoBusqueda = $request->input('termino');

        $amigos = Usuarios::where('nombre', 'like', "%$terminoBusqueda%")
            ->orWhere('apellido', 'like', "%$terminoBusqueda%")
            ->get();

        return response()->json(['amigos' => $amigos]);
    }
}
