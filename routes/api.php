<?php

use App\Http\Controllers\AlbumApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViajeApiController;
use App\Http\Controllers\AmistadApiController;
use App\Http\Controllers\ComentarioApiController;
use App\Http\Controllers\UsuariosApiController;
use App\Http\Controllers\ValoracionApiController;


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

//ViajeApiController
Route::post('/viajes', [ViajeApiController::class, 'crearViaje']);
Route::put('/viajes/{viaje}', [ViajeApiController::class, 'editarViaje']);
Route::delete('/viajes/{viaje}', [ViajeApiController::class, 'eliminarViaje']);
Route::get('/viajes', [ViajeApiController::class, 'obtenerViajes']);
// ! Nombre correcto /viajes/{id}/estado
// ! Deberia de usarse la operacion patch (Route::patch) en lugar de put (se usa patch para actualizar solo una parte de un recurso)
Route::put('/viajes/{id}/cambiar-estado', [ViajeApiController::class, 'cambiarEstado']);
// ! Deberia de usarse la operacion patch en lugar de put (se usa patch para actualizar solo una parte de un recurso)
// https://www.deyel.com/doc/Deyel82/metodoputpatch.html
// Route::patch('');
Route::put('/viajes/{id}/recomendar', [ViajeApiController::class, 'recomendarViaje']);
// ! Sobra endpoint /viajes/{id}/recomendar puede pasar como param si es recomendado o no
Route::put('/viajes/{id}/no-recomendar', [ViajeApiController::class, 'noRecomendarViaje']);

//AmistadApiController
Route::post('/amistades/solicitar', [AmistadApiController::class, 'solicitarAmistad']);
Route::put('/amistades/{id}/aceptar', [AmistadApiController::class, 'aceptarSolicitudAmistad']);
Route::delete('/amistades/{id}/rechazar', [AmistadApiController::class, 'rechazarSolicitudAmistad']);
Route::delete('/amistades/{id}', [AmistadApiController::class, 'borrarAmigo']);
// ! La busqueda tiene que ser por nombre de usuario
// ! La busqueda deberia enviar 2 parametros distintos (nombre y apellidos)
Route::get('/amistades/buscar', [AmistadApiController::class, 'buscarAmigo']);
Route::get('/amistades', [AmistadApiController::class, 'obtenerAmistades']);

//AlbumApiController
Route::post('/albumes', [AlbumApiController::class, 'crearAlbum']);
// * Aqui si estaria bien usado el put porque se va a actualizar el recurso entero (todas las propiedades del album)
Route::put('/albumes/{album}', [AlbumApiController::class, 'editarAlbum']);
Route::delete('/albumes/{album}', [AlbumApiController::class, 'borrarAlbum']);
// ! Estos get deberian siempre como minimo permitir buscar por id (y a parte por cualquier otra cosa que se quiera)
Route::get('/albumes/buscar', [AlbumApiController::class, 'buscarAlbum']);
Route::get('/albumes', [AlbumApiController::class, 'obtenerAlbumes']);

//ComentarioApiController
Route::post('/comentarios', [ComentarioApiController::class, 'crearComentario']);
Route::put('/comentarios/{comentario}', [ComentarioApiController::class, 'editarComentario']);
Route::delete('/comentarios/{comentario}', [ComentarioApiController::class, 'borrarComentario']);
Route::get('/comentarios', [ComentarioApiController::class, 'obtenerComentarios']);

//ValoracionApiController
Route::post('/valoraciones', [ValoracionApiController ::class, 'crearValoracion']);
Route::put('/valoraciones/{valoracion}', [ValoracionApiController::class, 'editarValoracion']);
Route::delete('/valoraciones/{valoracion}',  [ValoracionApiController::class, 'borrarValoracion']);
Route::get('/valoraciones', [ValoracionApiController ::class, 'obtenerValoraciones']);

//UsuariosApiController
Route::post('/usuarios/registrar', [UsuariosApiController::class, 'registrarUsuario']);
Route::put('/usuarios/{id}', [UsuariosApiController::class, 'editarUsuario']);
Route::post('/usuarios/login', [UsuariosApiController::class, 'login']);
Route::get('/usuarios', [UsuariosApiController::class, 'obtenerUsuarios']);
Route::delete('/usuarios/{id}', [UsuariosApiController::class, 'eliminarUsuario']);

