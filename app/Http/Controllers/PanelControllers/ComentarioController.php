<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comentarios;
use App\Models\posts;
use App\Models\Usuarios;

class ComentarioController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-comentario|crear-comentario|editar-comentario|borrar-comentario', ['only' => ['index']]);
        $this->middleware('permission:crear-comentario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-comentario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-comentario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $posts = Posts::all();
        $comentarios = comentarios::paginate(5);
        return view('comentarios.index', compact('comentarios', 'posts', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        $posts = Posts::all();
        return view('comentarios.crear', compact('posts', 'usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|max:600',
            'usuarios_id' => 'required|exists:usuarios,id',
            'post_id' => 'required|exists:posts,id'
        ]);

        Comentarios::create($request->all());

        return redirect()->route('comentarios.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(comentarios $comentario)
    {
        $usuarios = Usuarios::all();
        $posts = Posts::all();
        return view('comentarios.editar', compact('comentario', 'posts', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentarios $comentario)
    {
        $request->validate([
            'contenido' => 'required|max:600',
            'usuarios_id' => 'required|exists:usuarios,id',
            'post_id' => 'required|exists:posts,id'
        ]);
        $comentario->update($request->all());

        return redirect()->route('comentarios.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(comentarios $comentario)
    {
        //
        $comentario->delete();
        return redirect()->route('comentarios.index');
    }

}
