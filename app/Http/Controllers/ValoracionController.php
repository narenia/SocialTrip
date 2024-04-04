<?php

namespace App\Http\Controllers;

use App\Models\Valoraciones;
use App\Models\Viajes;
use Illuminate\Http\Request;

class ValoracionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-valoracion|crear-valoracion|editar-valoracion|borrar-valoracion', ['only' => ['index']]);
        $this->middleware('permission:crear-valoracion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-valoracion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-valoracion', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viajes = Viajes::all();
        $valoraciones = Valoraciones::paginate(5);
        return view('valoraciones.index', compact('valoraciones', 'viajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $viajes = Viajes::all();
        return view('valoraciones.crear', compact('viajes'));
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
            'puntuacion' => 'required|integer',
            'valoracion' => 'required|max:700',
            'viaje_id' => 'required|exists:viajes,id'
        ]);

        Valoraciones::create($request->all());

        return redirect()->route('valoraciones.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Valoraciones $valoracion)
    {
        $viajes = viajes::all();
        return view('valoraciones.editar', compact('valoracion', 'viajes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Valoraciones $valoracion)
    {
        $request->validate([
            'puntuacion' => 'required|integer',
            'valoracion' => 'required|max:700',
            'viaje_id' => 'required|exists:viajes,id'
        ]);

        $valoracion->update($request->all());

        return redirect()->route('valoraciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Valoraciones $valoracion)
    {
        //
        $valoracion->delete();
        return redirect()->route('valoraciones.index');
    }
}
