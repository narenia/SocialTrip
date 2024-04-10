<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViajeApiController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AmistadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/viajes', [ViajeApiController::class, 'store']);
Route::put('/viajes/{viaje}', [ViajeApiController::class, 'update']);
Route::delete('/viajes/{viaje}', [ViajeApiController::class, 'destroy']);
Route::get('/viajes', [ViajeApiController::class, 'index']);
Route::post('/amistades/solicitar', [AmistadController::class, 'solicitarAmistad']);
Route::put('/amistades/{id}/aceptar', [AmistadController::class, 'aceptarSolicitudAmistad']);
Route::delete('/amistades/{id}/rechazar',[AmistadController::class, 'rechazarSolicitudAmistad']);
Route::delete('/amistades/{id}', [AmistadController::class, 'borrarAmigo']);
Route::get('/amistades/buscar', [AmistadController::class, 'buscarAmigo']);
Route::put('/viajes/{id}/recomendar', [ViajeApiController::class, 'recomendarViaje']);
Route::put('/viajes/{id}/no-recomendar', [ViajeApiController::class, 'noRecomendarViaje']);
Route::post('/albumes', [AlbumController::class, 'crear']);
Route::put('/albumes/{album}', [AlbumController::class, 'editar']);
Route::delete('/albumes/{album}', [AlbumController::class, 'borrar']);
Route::get('/albumes/buscar', [AlbumController::class, 'buscar']);
Route::put('/viajes/{id}/cambiar-estado', [ViajeApiController::class, 'cambiarEstado']);
