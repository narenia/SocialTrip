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
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
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
});
