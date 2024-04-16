<?php

namespace App\Http\Controllers;

use App\Models\Albumes;
use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Viajes;
use App\Models\Imagenes;


class ImagenController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:ver-imagen|crear-imagen|editar-imagen|borrar-imagen', ['only' => ['index']]);
        $this->middleware('permission:crear-imagen', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-imagen', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-imagen', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albumes = Albumes::all();
        $viajes = Viajes::all();
        $posts = Posts::all();
        $imagenes = Imagenes::paginate(5);
        return view('imagenes.index', compact('imagenes', 'viajes', 'posts', 'albumes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albumes = Albumes::all();
        $viajes = Viajes::all();
        $posts = Posts::all();
        return view('imagenes.crear', compact('viajes', 'posts', 'albumes'));
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
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif', // Validación para asegurar que se envíe una imagen
            'album_id' => 'nullable|exists:albumes,id',
            'posts_id' => 'nullable|exists:posts,id',
            'viajes_id' => 'nullable|exists:viajes,id',
        ]);

        // Subir la imagen al almacenamiento
        $imagenPath = $request->file('imagen')->store('imagenes');

        // Crear la entrada en la base de datos con la ruta de la imagen
        Imagenes::create([
            'ruta' => $imagenPath,
            'album_id' => $request->input('album_id'),
            'posts_id' => $request->input('posts_id'),
            'viajes_id' => $request->input('viajes_id'),
        ]);

        return redirect()->route('imagenes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\imagenes  $imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(Imagenes $imagen)
    {
        $albumes = Albumes::all();
        $viajes = Viajes::all();
        $posts = Posts::all();
        return view('imagenes.editar', compact('imagen', 'viajes', 'posts', 'albumes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagenes  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagenes $imagen)
    {
        $request->validate([
            'ruta' => 'required',
            'album_id' => 'nullable|exists:albumes,id',
            'posts_id' => 'nullable|exists:posts,id',
            'viajes_id' => 'nullable|exists:viajes,id',
        ]);

        $imagen->update($request->all());

        return redirect()->route('imagenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagenes  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagenes $imagen)
    {
        $imagen->delete();

        return redirect()->route('imagenes.index');
    }
}
