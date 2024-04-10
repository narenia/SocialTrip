<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\EstadosViajeController;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ValoracionController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ViajeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImagenController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AmistadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {return view('home');});
    Route::resource('roles', RolController::class);
    Route::resource('users', UsersController::class);
    Route::resource('usuarios', UsuariosController::class);
    // Rutas específicas para el controlador PaisController
    Route::get('paises', [PaisController::class, 'index'])->name('paises.index');
    Route::get('paises/create', [PaisController::class, 'create'])->name('paises.create');
    Route::post('paises', [PaisController::class, 'store'])->name('paises.store');
    Route::get('paises/{pais}/edit', [PaisController::class, 'edit'])->name('paises.edit');
    Route::put('paises/{pais}', [PaisController::class, 'update'])->name('paises.update');
    Route::delete('paises/{pais}', [PaisController::class, 'destroy'])->name('paises.destroy');
    // Rutas específicas para el controlador CiudadController
    Route::get('ciudades', [CiudadController::class, 'index'])->name('ciudades.index');
    Route::get('ciudades/create', [CiudadController::class, 'create'])->name('ciudades.create');
    Route::post('ciudades', [CiudadController::class, 'store'])->name('ciudades.store');
    Route::get('ciudades/{ciudad}/edit', [CiudadController::class, 'edit'])->name('ciudades.edit');
    Route::put('ciudades/{ciudad}', [CiudadController::class, 'update'])->name('ciudades.update');
    Route::delete('ciudades/{ciudad}', [CiudadController::class, 'destroy'])->name('ciudades.destroy');
    // Rutas específicas para el controlador Transporte
    Route::get('transportes', [TransporteController::class, 'index'])->name('transportes.index');
    Route::get('transportes/create', [TransporteController::class, 'create'])->name('transportes.create');
    Route::post('transportes', [TransporteController::class, 'store'])->name('transportes.store');
    Route::get('transportes/{transporte}/edit', [TransporteController::class, 'edit'])->name('transportes.edit');
    Route::put('transportes/{transporte}', [TransporteController::class, 'update'])->name('transportes.update');
    Route::delete('transportes/{transporte}', [TransporteController::class, 'destroy'])->name('transportes.destroy');
    // Rutas específicas para el controlador EstadosViaje
    Route::get('estados_viaje', [EstadosViajeController::class, 'index'])->name('estados_viaje.index');
    Route::get('estados_viaje/create', [EstadosViajeController::class, 'create'])->name('estados_viaje.create');
    Route::post('estados_viaje', [EstadosViajeController::class, 'store'])->name('estados_viaje.store');
    Route::get('estados_viaje/{estado_viaje}/edit', [EstadosViajeController::class, 'edit'])->name('estados_viaje.edit');
    Route::put('estados_viaje/{estado_viaje}', [EstadosViajeController::class, 'update'])->name('estados_viaje.update');
    Route::delete('estados_viaje/{estado_viaje}', [EstadosViajeController::class, 'destroy'])->name('estados_viaje.destroy');
    // Rutas específicas para el controlador Valoraciones
    Route::get('valoraciones', [ValoracionController::class, 'index'])->name('valoraciones.index');
    Route::get('valoraciones/create', [ValoracionController::class, 'create'])->name('valoraciones.create');
    Route::post('valoraciones', [ValoracionController::class, 'store'])->name('valoraciones.store');
    Route::get('valoraciones/{valoracion}/edit', [ValoracionController::class, 'edit'])->name('valoraciones.edit');
    Route::put('valoraciones/{valoracion}', [ValoracionController::class, 'update'])->name('valoraciones.update');
    Route::delete('valoraciones/{valoracion}', [ValoracionController::class, 'destroy'])->name('valoraciones.destroy');
    // Rutas específicas para el controlador Notificaciones
    Route::get('notificaciones', [NotificacionController::class, 'index'])->name('notificaciones.index');
    Route::get('notificaciones/create', [NotificacionController::class, 'create'])->name('notificaciones.create');
    Route::post('notificaciones', [NotificacionController::class, 'store'])->name('notificaciones.store');
    Route::get('notificaciones/{notificacion}/edit', [NotificacionController::class, 'edit'])->name('notificaciones.edit');
    Route::put('notificaciones/{notificacion}', [NotificacionController::class, 'update'])->name('notificaciones.update');
    Route::delete('notificaciones/{notificacion}', [NotificacionController::class, 'destroy'])->name('notificaciones.destroy');
    // Rutas específicas para el controlador Albumes
    Route::get('albumes', [AlbumController::class, 'index'])->name('albumes.index');
    Route::get('albumes/create', [AlbumController::class, 'create'])->name('albumes.create');
    Route::post('albumes', [AlbumController::class, 'store'])->name('albumes.store');
    Route::get('albumes/{album}/edit', [AlbumController::class, 'edit'])->name('albumes.edit');
    Route::put('albumes/{album}', [AlbumController::class, 'update'])->name('albumes.update');
    Route::delete('albumes/{album}', [AlbumController::class, 'destroy'])->name('albumes.destroy');
    // Rutas específicas para el controlador Viajes
    Route::get('viajes', [ViajeController::class, 'index'])->name('viajes.index');
    Route::get('viajes/create', [ViajeController::class, 'create'])->name('viajes.create');
    Route::post('viajes', [ViajeController::class, 'store'])->name('viajes.store');
    Route::get('viajes/{viaje}/edit', [ViajeController::class, 'edit'])->name('viajes.edit');
    Route::put('viajes/{viaje}', [ViajeController::class, 'update'])->name('viajes.update');
    Route::delete('viajes/{viaje}', [ViajeController::class, 'destroy'])->name('viajes.destroy');
    // Rutas específicas para el controlador Posts
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Rutas específicas para el controlador Comentarios
    Route::get('comentarios', [ComentarioController::class, 'index'])->name('comentarios.index');
    Route::get('comentarios/create', [ComentarioController::class, 'create'])->name('comentarios.create');
    Route::post('comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
    Route::get('comentarios/{comentario}/edit', [ComentarioController::class, 'edit'])->name('comentarios.edit');
    Route::put('comentarios/{comentario}', [ComentarioController::class, 'update'])->name('comentarios.update');
    Route::delete('comentarios/{comentario}', [ComentarioController::class, 'destroy'])->name('comentarios.destroy');
    // Rutas específicas para el controlador Imagenes
    Route::get('imagenes', [ImagenController::class, 'index'])->name('imagenes.index');
    Route::get('imagenes/create', [ImagenController::class, 'create'])->name('imagenes.create');
    Route::post('imagenes', [ImagenController::class, 'store'])->name('imagenes.store');
    Route::get('imagenes/{imagen}/edit', [ImagenController::class, 'edit'])->name('imagenes.edit');
    Route::put('imagenes/{imagen}', [ImagenController::class, 'update'])->name('imagenes.update');
    Route::delete('imagenes/{imagen}', [ImagenController::class, 'destroy'])->name('imagenes.destroy');
    // Rutas específicas para el controlador Amistades
    Route::get('amistades', [AmistadController::class, 'index'])->name('amistades.index');
    Route::get('amistades/create', [AmistadController::class, 'create'])->name('amistades.create');
    Route::post('amistades', [AmistadController::class, 'store'])->name('amistades.store');
    Route::get('amistades/{amistad}/edit', [AmistadController::class, 'edit'])->name('amistades.edit');
    Route::put('amistades/{amistades}', [AmistadController::class, 'update'])->name('amistades.update');
    Route::delete('amistades/{amistad}', [AmistadController::class, 'destroy'])->name('amistades.destroy');
});
