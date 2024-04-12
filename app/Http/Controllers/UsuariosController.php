<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;
use App\Models\Ciudades;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
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
    {   $ciudades = Ciudades::all();
        $usuarios = Usuarios::paginate(5);
        return view('usuarios.index', compact('usuarios','ciudades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades = Ciudades::all();
        $roles = Role::pluck('name', 'name')->all();
        return view('usuarios.crear', compact('roles','ciudades'));
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
            'nombre' => 'required|string|max:25',
            'email' => 'required|email|unique:usuarios,email',
            'contrasenna' => 'required|string|min:6|max:20',
            'tipo' => 'nullable|integer',
            'fecha_nacimiento' => 'required|date',
            'apellidos' => 'required|string|max:60',
            'nombre_usuario' => 'required|string|max:45|unique:usuarios,nombre_usuario',
            'dni' => 'nullable|string|max:9|unique:usuarios,dni',
            'ciudad_residencia' => 'required|exists:ciudades,id',
            'ciudad_nacimiento' => 'required|exists:ciudades,id',
        ]);
        $ciudades = Ciudades::all();
        $input = $request->all();
        $usuario = Usuarios::create($input);
        return redirect()->route('usuarios.index');
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
        $ciudades = Ciudades::all();
        $usuario = Usuarios::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $usuarioRole = $usuario->roles->pluck('name', 'name')->all();
        return view('usuarios.editar', compact('usuario','ciudades', 'roles', 'usuarioRole'));
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
            'nombre' => 'required|string|max:25',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'contrasenna' => 'nullable|string|min:6|max:20|confirmed',
            'tipo' => 'nullable|integer',
            'fecha_nacimiento' => 'required|date',
            'apellidos' => 'required|string|max:60',
            'nombre_usuario' => 'required|string|max:45|unique:usuarios,nombre_usuario,' . $id,
            'dni' => 'nullable|string|max:9|unique:usuarios,dni,' . $id,
            'ciudad_residencia' => 'required|exists:ciudades,id',
            'ciudad_nacimiento' => 'required|exists:ciudades,id',
        ]);

        $input = $request->all();
        if (!empty($input['contrasenna'])) {
            $input['contrasenna'] = Hash::make($input['contrasenna']);
        } else {
            $input = Arr::except($input, ['contrasenna']);
        }

        $usuario = Usuarios::find($id);
        $usuario->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $usuario->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Usuarios::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
   
}
