<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amistades;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AmistadController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuarios::all();
        $amistades = Amistades::paginate(5);
        return view('amistades.index', compact('amistades', 'usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuarios::all();
        return view('amistades.crear', compact('usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'usuario1_id' => 'required|exists:usuarios,id',
            'usuario2_id' => 'required|different:usuario1_id|exists:usuarios,id',
            'estado' => 'required|string|max:45',
        ]);

        $input = $request->all();
        $amistad = Amistades::create($input);

        return redirect()->route('amistades.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuarios = Usuarios::all();
        $amistad = Amistades::find($id);
        return view('amistades.editar', compact('usuarios', 'amistad'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'usuario1_id' => 'required|exists:usuarios,id',
            'usuario2_id' => 'required|different:usuario1_id|exists:usuarios,id',
            'estado' => 'required|string|max:45',
        ]);

        $input = $request->all();
        $amistad = Amistades::find($id);
        $amistad->update($input);
        return redirect()->route('amistades.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Amistades::find($id)->delete();
        return redirect()->route('amistades.index');
    }

    public function solicitarAmistad(Request $request)
    {
        $usuario1_id = Auth::id();
        $usuario2_id = $request->input('usuario2_id');

        $solicitudExistente = Amistades::where('usuario1_id', $usuario1_id)
            ->where('usuario2_id', $usuario2_id)
            ->orWhere(function ($query) use ($usuario1_id, $usuario2_id) {
                $query->where('usuario1_id', $usuario2_id)
                    ->where('usuario2_id', $usuario1_id);
            })
            ->exists();

        if ($solicitudExistente) {
            return response()->json(['message' => 'Ya existe una solicitud de amistad entre estos usuarios']);
        }

        Amistades::create([
            'usuario1_id' => $usuario1_id,
            'usuario2_id' => $usuario2_id,
            'estado' => 'Pendiente'
        ]);

        return response()->json(['message' => 'Solicitud de amistad enviada']);
    }

    public function aceptarSolicitudAmistad($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Solicitud de amistad no encontrada']);
        }

        $amistad->update(['estado' => 'Aceptada']);

        return response()->json(['message' => 'Solicitud de amistad aceptada']);
    }

    public function rechazarSolicitudAmistad($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Solicitud de amistad no encontrada']);
        }

        $amistad->delete();

        return response()->json(['message' => 'Solicitud de amistad rechazada']);
    }

    public function borrarAmigo($id)
    {
        $amistad = Amistades::find($id);

        if (!$amistad) {
            return response()->json(['message' => 'Amistad no encontrada']);
        }

        $amistad->delete();

        return response()->json(['message' => 'Amistad eliminada correctamente']);
    }
    public function buscarAmigo(Request $request)
    {
        $terminoBusqueda = $request->input('termino');

        $amigos = Usuarios::where('nombre', 'like', "%$terminoBusqueda%")
            ->orWhere('apellido', 'like', "%$terminoBusqueda%")
            ->get();

        return response()->json(['amigos' => $amigos]);
    }
}
