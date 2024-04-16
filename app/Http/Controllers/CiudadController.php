<?php

namespace App\Http\Controllers;
use App\Models\Ciudades;
use App\Models\Paises;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-ciudad|crear-ciudad|editar-ciudad|borrar-ciudad', ['only' => ['index']]);
        $this->middleware('permission:crear-ciudad', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-ciudad', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-ciudad', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ciudades = Ciudades::paginate(5);
        return view('ciudades.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::all();
        return view('ciudades.crear')->with('paises', $paises);
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
                'pais_id' => 'required|exists:paises,id'
            ]
        );

        Ciudades::create($request->all());
        return redirect()->route('ciudades.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudades $ciudad)
    {
        $paises = Paises::all();
        return view('ciudades.editar', compact('ciudad','paises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudades $ciudad)
    {
        request()->validate([
            'nombre' => 'required',
            'pais_id' => 'required|exists:paises,id'
        ]);
        $ciudad->update($request->all());
        return redirect()->route('ciudades.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ciudades $ciudad)
    {
        //
        $ciudad->delete();
        return redirect()->route('ciudades.index');
    }
}
