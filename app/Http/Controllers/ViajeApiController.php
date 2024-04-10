<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viajes;

class ViajeApiController extends Controller
{
    public function index()
    {
        $viajes = Viajes::all();

        return response()->json(['viajes' => $viajes], 200);
    }

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

        return response()->json(['message' => 'Viaje registrado con éxito'], 201);
    }

    public function update(Request $request, Viajes $viaje)
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

        return response()->json(['message' => 'Viaje actualizado con éxito'], 200);
    }

    public function destroy(Viajes $viaje)
    {
        $viaje->delete();

        return response()->json(['message' => 'Viaje eliminado con éxito'], 200);
    }
    public function recomendarViaje(Request $request, $id)
    {
        $viaje = Viajes::find($id);

        if (!$viaje) {
            return response()->json(['message' => 'Viaje no encontrado'], 404);
        }

        $viaje->update(['recomendado' => true]);

        return response()->json(['message' => 'Viaje recomendado con éxito'], 200);
    }

    public function noRecomendarViaje(Request $request, $id)
    {
        $viaje = Viajes::find($id);

        if (!$viaje) {
            return response()->json(['message' => 'Viaje no encontrado'], 404);
        }

        $viaje->update(['recomendado' => false]);

        return response()->json(['message' => 'Viaje marcado como no recomendado'], 200);
    }

    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados_viajes,id'
        ]);

        $viaje = Viajes::findOrFail($id);

        $viaje->update(['estados_viajes_id' => $request->estado_id]);

        return response()->json(['message' => 'Estado del viaje actualizado correctamente'], 200);
    }
}
