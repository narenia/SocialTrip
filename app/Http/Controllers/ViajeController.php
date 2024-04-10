<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viajes;
use App\Models\Usuarios;
use App\Models\Transportes;
use App\Models\Estados_viaje;
use App\Models\Ciudades;

class ViajeController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-viaje|crear-viaje|editar-viaje|borrar-viaje', ['only' => ['index']]);
        $this->middleware('permission:crear-viaje', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-viaje', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-viaje', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $transportes = Transportes::all();
        $estados_viaje = Estados_viaje::all();
        $ciudades = Ciudades::all();
        $viajes = Viajes::paginate(5);
        return view('viajes.index', compact('viajes', 'usuarios','transportes','estados_viaje','ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        $transportes = Transportes::all();
        $estados_viajes = Estados_viaje::all();
        $ciudades = Ciudades::all();

        return view('viajes.crear', compact('usuarios','transportes','estados_viajes','ciudades'));
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
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'transporte_id' => 'required|exists:transportes,id',
            'estados_viajes_id' => 'required|exists:estados_viajes,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'ciudad_salida_id' => 'nullable|exists:ciudades,id',
            'ciudad_destino_id' => 'required|exists:ciudades,id',
            'recomendado' => 'nullable|integer'
        ]);

        Viajes::create($request->all());

        return redirect()->route('viajes.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Viajes $viaje)
    {
        $usuarios = Usuarios::all();
        $transportes = Transportes::all();
        $estados_viajes = Estados_viaje::all();
        $ciudades = Ciudades::all();
        return view('viajes.editar', compact('viaje', 'usuarios','transportes','estados_viajes','ciudades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, viajes $viaje)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date',
            'transporte_id' => 'required|exists:transportes,id',
            'estados_viajes_id' => 'required|exists:estados_viajes,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'ciudad_salida_id' => 'nullable|exists:ciudades,id',
            'ciudad_destino_id' => 'required|exists:ciudades,id',
            'recomendado' => 'nullable|integer'
        ]);


        $viaje->update($request->all());

        return redirect()->route('viajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viajes $viaje)
    {
        //
        $viaje->delete();
        return redirect()->route('viajes.index');
    }


}
