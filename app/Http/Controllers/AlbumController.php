<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Albumes;
use App\Models\Usuarios;

class AlbumController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-album|crear-album|editar-album|borrar-album', ['only' => ['index']]);
        $this->middleware('permission:crear-album', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-album', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-album', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $albumes = Albumes::paginate(5);
        return view('albumes.index', compact('albumes', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        return view('albumes.crear', compact('usuarios'));
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
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Albumes::create($request->all());

        return redirect()->route('albumes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Albumes  $album
     * @return \Illuminate\Http\Response
     */
    public function edit(Albumes $album)
    {
        $usuarios = Usuarios::all();
        return view('albumes.editar', compact('album', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Albumes  $album
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Albumes $album)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);


        $album->update($request->all());

        return redirect()->route('albumes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Albumes  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy(Albumes $album)
    {
        $album->delete();

        return redirect()->route('albumes.index');
    }


    public function buscar(Request $request)
    {
        $terminoBusqueda = $request->input('termino');

        $albumes = Albumes::where('nombre', 'like', "%$terminoBusqueda%")
            ->get();

        return response()->json(['albumes' => $albumes], 200);
    }

    public function crear(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Albumes::create($request->all());

        return response()->json(['message' => 'Álbum creado correctamente'], 201);
    }

    public function editar(Request $request, Albumes $album)
    {
        $request->validate([
            'nombre' => 'required',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $album->update($request->all());

        return response()->json(['message' => 'Álbum actualizado correctamente'], 200);
    }

    public function borrar(Albumes $album)
    {
        $album->delete();

        return response()->json(['message' => 'Álbum eliminado correctamente'], 200);
    }
}
