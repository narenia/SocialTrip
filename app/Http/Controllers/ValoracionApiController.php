<?php

namespace App\Http\Controllers;

use App\Models\Valoraciones;
use Illuminate\Http\Request;

class ValoracionApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:usuarios');
    }

    public function crearValoracion(Request $request)
    {
        $request->validate([
            'puntuacion' => 'required|integer|between:1,10|max:10',
            'valoracion' => 'required|max:700',
            'viaje_id' => 'required|exists:viajes,id'
        ]);

        $valoracion = Valoraciones::create($request->all());

        return response()->json(['message' => 'Valoración creada correctamente', 'valoracion' => $valoracion]);
    }

    public function editarValoracion(Request $request, Valoraciones $valoracion)
    {
        $request->validate([
            'puntuacion' => 'required|integer|between:1,10|max:10',
            'valoracion' => 'required|max:700',
            'viaje_id' => 'required|exists:viajes,id'
        ]);

        $valoracion->update($request->all());

        return response()->json(['message' => 'Valoración actualizada correctamente', 'valoracion' => $valoracion]);
    }

    public function borrarValoracion(Valoraciones $valoracion)
    {
        $valoracion->delete();

        return response()->json(['message' => 'Valoración eliminada correctamente']);
    }

    public function obtenerValoraciones()
    {

        $valoraciones = Valoraciones::all();

        return response()->json(['valoraciones' => $valoraciones]);
    }
}
