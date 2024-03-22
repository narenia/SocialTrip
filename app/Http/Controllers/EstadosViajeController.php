<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estados_viaje;
class EstadosViajeController extends Controller

{
    function __construct()
    {
        $this->middleware('permission:ver-estado_viaje|crear-estado_viaje|editar-estado_viaje|borrar-estado_viaje', ['only' => ['index']]);
        $this->middleware('permission:crear-estado_viaje', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-estado_viaje', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-estado_viaje', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estados_viaje = Estados_viaje::paginate(5);
        return view('estados_viaje.index', compact('estados_viaje'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Estados_viaje::all();
        return view('estados_viaje.crear')->with('paises', $paises);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate(
            [
                'nombre' => 'required',
                'pais_id' => 'required'
            ]
        );

        Estados_viaje::create($request->all());
        return redirect()->route('estados_viaje.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Estados_viaje $estado_viaje)
    {
        $paises = Estados_viaje::all();
        return view('estados_viaje.editar', compact('estado_viaje', 'paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estados_viaje $estado_viaje)
    {
        request()->validate([
            'nombre' => 'required',
            'pais_id' => 'required'
        ]);
        $estado_viaje->update($request->all());
        return redirect()->route('estados_viaje.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estados_viaje $estado_viaje)
    {
        //
        $estado_viaje->delete();
        return redirect()->route('estados_viaje.index');
    }
}
