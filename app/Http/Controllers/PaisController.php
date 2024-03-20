<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pais;

class PaisController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-pais|crear-pais|editar-pais|borrar-pais', ['only' => ['index']]);
        $this->middleware('permission:crear-pais', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-pais', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-pais', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $paises = Pais::paginate(5);
        return view('paises.index', compact('paises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paises.crear');
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
                'nombre' => 'required'
            ]
        );
        Pais::create($request->all());
        return redirect()->route('paises.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pais $pais)
    {
        return view('paises.editar', compact('pais'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pais $pais)
    {
        request()->validate([
            'nombre' => 'required'
        ]);
        $pais->update($request->all());
        return redirect()->route('paises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pais $pais)
    {
        //
        $pais->delete();
        return redirect()->route('paises.index');
    }
}
