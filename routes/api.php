<?php

use App\Http\Controllers\AlbumApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViajeApiController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AmistadApiController;
use App\Http\Controllers\AmistadController;
use App\Http\Controllers\ComentarioApiController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\UsuariosApiController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ValoracionApiController;
use App\Http\Controllers\ValoracionController;

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
Route::post('/amistades/solicitar', [AmistadApiController::class, 'solicitarAmistad']);
Route::put('/amistades/{id}/aceptar', [AmistadApiController::class, 'aceptarSolicitudAmistad']);
Route::delete('/amistades/{id}/rechazar', [AmistadApiController::class, 'rechazarSolicitudAmistad']);
Route::delete('/amistades/{id}', [AmistadApiController::class, 'borrarAmigo']);
Route::get('/amistades/buscar', [AmistadApiController::class, 'buscarAmigo']);
Route::put('/viajes/{id}/recomendar', [AmistadApiController::class, 'recomendarViaje']);
Route::put('/viajes/{id}/no-recomendar', [AmistadApiController::class, 'noRecomendarViaje']);
Route::post('/albumes', [AlbumApiController::class, 'crear']);
Route::put('/albumes/{album}', [AlbumApiController::class, 'editar']);
Route::delete('/albumes/{album}', [AlbumApiController::class, 'borrar']);
Route::get('/albumes/buscar', [AlbumApiController::class, 'buscar']);
Route::put('/viajes/{id}/cambiar-estado', [ViajeApiController::class, 'cambiarEstado']);
Route::post('/comentarios', [ComentarioApiController::class, 'crearComentario']);
Route::put('/comentarios/{comentario}', [ComentarioApiController::class, 'editarComentario']);
Route::delete('/comentarios/{comentario}', [ComentarioApiController::class, 'borrarComentario']);
Route::post('/valoraciones', [ValoracionApiController ::class, 'crearValoracion']);
Route::put('/valoraciones/{valoracion}', [ValoracionApiController::class, 'editarValoracion']);
Route::delete('/valoraciones/{valoracion}',  [ValoracionApiController::class, 'borrarValoracion']);
Route::post('/usuarios/registrar', [UsuariosApiController::class, 'registrar']);
Route::put('/usuarios/{id}', [UsuariosApiController::class, 'editar']);
Route::post('/usuarios/login', [UsuariosApiController::class, 'login']);
Route::get('/usuarios', [UsuariosApiController::class, 'obtenerUsuarios']);
Route::delete('/usuarios/{id}', [UsuariosApiController::class, 'eliminarUsuario']);
