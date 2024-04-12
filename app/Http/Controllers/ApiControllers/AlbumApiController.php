<?php

namespace App\Http\Controllers;

use App\Models\Albumes;
use Illuminate\Http\Request;

class AlbumApiController extends Controller
{
    public function buscar(Request $request)
    {
        $terminoBusqueda = $request->input('termino');

        $albumes = Albumes::where('nombre', 'like', "%$terminoBusqueda%")
            ->get();

        return response()->json(['albumes' => $albumes]);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Albumes::create($request->all());

        return response()->json(['message' => 'Álbum creado correctamente']);
    }

    public function editar(Request $request, Albumes $album)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $album->update($request->all());

        return response()->json(['message' => 'Álbum actualizado correctamente']);
    }

    public function borrar(Albumes $album)
    {
        $album->delete();

        return response()->json(['message' => 'Álbum eliminado correctamente']);
    }
}
