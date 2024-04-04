<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificaciones;
use App\Models\Usuarios;

class NotificacionController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-notificacion|crear-notificacion|editar-notificacion|borrar-notificacion', ['only' => ['index']]);
        $this->middleware('permission:crear-notificacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-notificacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-notificacion', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $notificaciones = Notificaciones::paginate(5);
        return view('notificaciones.index', compact('notificaciones','usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        return view('notificaciones.crear', compact('usuarios'));
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
            'tipo' => 'required|max:70',
            'estado' => 'required|max:40',
            'fecha' => 'required|date',
            'contenido' => 'required|max:200',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        Notificaciones::create($request->all());

        return redirect()->route('notificaciones.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(notificaciones $notificacion)
    {
        $usuarios = Usuarios::all();
        return view('notificaciones.editar', compact('notificacion','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notificaciones $notificacion)
    {
        $request->validate([
            'tipo' => 'required|max:70',
            'estado' => 'required|max:40',
            'fecha' => 'required|date',
            'contenido' => 'required|max:200',
            'usuario_id' => 'required|exists:usuarios,id'
        ]);

        $notificacion->update($request->all());

        return redirect()->route('notificaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(notificaciones $notificacion)
    {
        //
        $notificacion->delete();
        return redirect()->route('notificaciones.index');
    }
}
