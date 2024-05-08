<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viajes;

class ViajeApiController extends Controller
{

    public function obtenerViajes()
    {
        $viajes = Viajes::all();

        return response()->json(['viajes' => $viajes]);
    }

    public function crearViaje(Request $request)
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

        return response()->json(['message' => 'Viaje registrado con éxito']);
    }

    public function editarViaje(Request $request, Viajes $viaje)
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

        return response()->json(['message' => 'Viaje actualizado con éxito']);
    }

    public function eliminarViaje(Viajes $viaje)
    {
        $viaje->delete();

        return response()->json(['message' => 'Viaje eliminado con éxito']);
    }
    public function recomendarViaje(Request $request, $id)
    {
        $request->validate([
            'recomendar' => 'required|boolean',
        ]);

        $viaje = Viajes::find($id);

        if (!$viaje) {
            return response()->json(['message' => 'Viaje no encontrado'], 404);
        }

        $recomendar = $request->input('recomendar');

        $viaje->update(['recomendado' => $recomendar]);

        $message = $recomendar ? 'Viaje recomendado con éxito' : 'Viaje no recomendado';

        return response()->json(['message' => $message]);
    }


    public function cambiarEstado(Request $request, $id)
    {
        $request->validate([
            'estado_id' => 'required|exists:estados_viajes,id'
        ]);

        $viaje = Viajes::findOrFail($id);

        $viaje->update(['estados_viajes_id' => $request->estado_id]);

        return response()->json(['message' => 'Estado del viaje actualizado correctamente']);
    }
    
}
