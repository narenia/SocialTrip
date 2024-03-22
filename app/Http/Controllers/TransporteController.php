<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportes;

class TransporteController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-transporte|crear-transporte|editar-transporte|borrar-transporte', ['only' => ['index']]);
        $this->middleware('permission:crear-transporte', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-transporte', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-transporte', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $transportes = Transportes::paginate(5);
        return view('transportes.index', compact('transportes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transportes.crear');
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
        Transportes::create($request->all());
        return redirect()->route('transportes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transportes $transporte)
    {
        return view('transportes.editar', compact('transporte'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transportes $transporte)
    {
        request()->validate([
            'nombre' => 'required'
        ]);
        $transporte->update($request->all());
        return redirect()->route('transportes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transportes $transporte)
    {
        //
        $transporte->delete();
        return redirect()->route('transportes.index');
    }
}
