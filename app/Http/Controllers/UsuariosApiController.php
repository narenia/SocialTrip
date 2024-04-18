<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosApiController extends Controller
{
    public function registrarUsuario(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:usuarios,email',
            'contrasenna' => 'required|string|min:6|max:20',
            'nombre_usuario' => 'required|string|max:45|unique:usuarios,nombre_usuario',
            // Resto de campos permitidos como nulos
            'nombre' => 'nullable|string|max:25',
            'tipo' => 'nullable|integer',
            'fecha_nacimiento' => 'nullable|date',
            'apellidos' => 'nullable|string|max:60',
            'dni' => 'nullable|string|max:9|unique:usuarios,dni',
            'ciudad_residencia' => 'nullable|exists:ciudades,id',
            'ciudad_nacimiento' => 'nullable|exists:ciudades,id',
        ]);

        // Obtener los datos de la solicitud
        $input = $request->all();

        // Crear un nuevo array con los campos requeridos
        $usuarioData = [
            'email' => $input['email'],
            'contrasenna' => $input['contrasenna'],
            'nombre_usuario' => $input['nombre_usuario'],
        ];

        // Crear el usuario con los datos proporcionados
        $usuario = Usuarios::create($usuarioData);
        return response()->json(['message' => 'Usuario registrado correctamente', 'usuario' => $usuario], 201);
    }



    public function editarUsuario(Request $request, $id)
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
            unset($input['contrasenna']);
        }

        $usuario = Usuarios::find($id);
        $usuario->update($input);

        return response()->json(['message' => 'Usuario actualizado correctamente', 'usuario' => $usuario], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('nombre_usuario', 'contrasenna');

        if (Auth::attempt($credentials)) {
            $usuario = Auth::user();
            return response()->json(['message' => 'Inicio de sesión exitoso', 'usuario' => $usuario], 200);
        } else {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }
    }

    public function obtenerUsuarios()
    {
        $usuarios = Usuarios::all();
        return response()->json(['usuarios' => $usuarios], 200);
    }

    public function eliminarUsuario($id)
    {
        $usuario = Usuarios::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
    }
}
