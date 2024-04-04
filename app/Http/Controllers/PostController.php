<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Viajes;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-post|crear-post|editar-post|borrar-post', ['only' => ['index']]);
        $this->middleware('permission:crear-post', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-post', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-post', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $viajes = Viajes::all();
        $posts = Posts::paginate(5);
        return view('posts.index', compact('posts', 'viajes', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        $viajes = Viajes::all();
        return view('posts.crear', compact('viajes', 'usuarios'));
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
            'titulo' => 'required|max:45',
            'contenido' => 'required|max:600',
            'usuario_id' => 'required|exists:usuarios,id',
            'viajes_id' => 'required|exists:viajes,id'
        ]);

        Posts::create($request->all());

        return redirect()->route('posts.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $usuarios = Usuarios::all();
        $viajes = Viajes::all();
        return view('posts.editar', compact('post', 'viajes', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'titulo' => 'required|max:45',
            'contenido' => 'required|max:600',
            'usuario_id' => 'required|exists:usuarios,id',
            'viajes_id' => 'required|exists:viajes,id'
        ]);
        $post->update($request->all());

        return redirect()->route('posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        //
        $post->delete();
        return redirect()->route('posts.index');
    }
}
