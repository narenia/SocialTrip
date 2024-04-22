<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use Illuminate\Http\Request;

class ComentarioApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:usuarios');
    }

    public function crearComentario(Request $request)
    {
        $request->validate([
            'contenido' => 'required|max:600',
            'usuarios_id' => 'required|exists:usuarios,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        $comentario = Comentarios::create($request->all());

        return response()->json(['message' => 'Comentario creado correctamente']);
    }

    public function editarComentario(Request $request, Comentarios $comentario)
    {
        $request->validate([
            'contenido' => 'required|max:600',
            'usuarios_id' => 'required|exists:usuarios,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        $comentario->update($request->all());

        return response()->json(['message' => 'Comentario actualizado correctamente']);
    }

    public function borrarComentario(Comentarios $comentario)
    {
        $comentario->delete();

        return response()->json(['message' => 'Comentario eliminado correctamente']);
    }

    public function obtenerComentarios()
    {

        $comentarios = Comentarios::all();

        return response()->json(['comentarios' => $comentarios]);
    }

}
