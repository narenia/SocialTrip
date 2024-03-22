<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\TransporteController;
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

Route::group(['middleware' => ['auth']], function(){
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
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
    Route::get('estados_viaje', [TransporteController::class, 'index'])->name('transportes.index');
    Route::get('estados_viaje/create', [TransporteController::class, 'create'])->name('transportes.create');
    Route::post('estados_viaje', [TransporteController::class, 'store'])->name('transportes.store');
    Route::get('estados_viaje/{estado_viaje}/edit', [TransporteController::class, 'edit'])->name('transportes.edit');
    Route::put('estados_viaje/{estado_viaje}', [TransporteController::class, 'update'])->name('transportes.update');
    Route::delete('estados_viaje/{estado_viaje}', [TransporteController::class, 'destroy'])->name('transportes.destroy');

});
