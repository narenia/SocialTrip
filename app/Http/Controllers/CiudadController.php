<?php

namespace App\Http\Controllers;
use App\Models\Ciudad;
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
        $ciudades = Ciudad::paginate(5);
        return view('ciudades.index', compact('ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciudades.crear');
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
                'pais' => 'required'
            ]
        );

        Ciudad::create($request->all());
        return redirect()->route('ciudades.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciudad $ciudad)
    {
        return view('ciudades.editar', compact('ciudad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciudad $ciudad)
    {
        request()->validate([
            'nombre' => 'required',
            'pais' => 'required'
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
    public function destroy(Ciudad $ciudad)
    {
        //
        $ciudad->delete();
        return redirect()->route('ciudades.index');
    }
}
