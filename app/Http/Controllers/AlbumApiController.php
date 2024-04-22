<?php

namespace App\Http\Controllers;

use App\Models\Albumes;
use Illuminate\Http\Request;

class AlbumApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:usuarios');
    }

    public function buscarAlbum(Request $request)
    {
        $terminoBusqueda = $request->input('termino');

        $albumes = Albumes::where('nombre', 'like', "%$terminoBusqueda%")
            ->get();

        return response()->json(['albumes' => $albumes]);
    }

    public function crearAlbum(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Albumes::create($request->all());

        return response()->json(['message' => 'Álbum creado correctamente']);
    }

    public function editarAlbum(Request $request, Albumes $album)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $album->update($request->all());

        return response()->json(['message' => 'Álbum actualizado correctamente']);
    }

    public function borrarAlbum(Albumes $album)
    {
        $album->delete();

        return response()->json(['message' => 'Álbum eliminado correctamente']);
    }

    public function obtenerAlbumes()
    {

        $albumes = Albumes::all();

        return response()->json(['albumes' => $albumes]);
    }
}
