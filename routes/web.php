<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DispositivosController;
use App\Http\Controllers\GrabadoraController;
use App\Http\Controllers\ImpresoraController;
use App\Http\Controllers\MaquinaFicharController;
use App\Http\Controllers\OrdenadorController;
use App\Http\Controllers\TelefonosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\ZonasController;
use Laravel\Fortify\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Middleware

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dispositivos',[DispositivosController::class, 'index']);
        
    //Dashboard
    Route::get('/dashboard', function () {

        return Inertia::render('Dashboard');

    })->name('dashboard'); 
    
//Rutas Dispositivos
Route::get('/dispositivos/crear',[DispositivosController::class, 'crear']);
Route::get('/api/dispositivos/buscar',[DispositivosController::class,'busqueda']);
Route::delete('/dispositivos/borrar/{id}',[DispositivosController::class,'delete']);


//Rutas Ordenadores
Route::post('/ordenador/crear',[OrdenadorController::class,'store']);
Route::get('/ordenador/mostrar/{id}',[OrdenadorController::class,'show']);
Route::get('/ordenador/actualizar/{id}',[OrdenadorController::class,'edit']);
Route::post('/ordenador/actualizar/{id}',[OrdenadorController::class,'update']);
Route::delete('/ordenador/eliminar/{id}',[OrdenadorController::class,'delete']);


//Rutas Grabadoras
Route::post('/grabadora/crear',[GrabadoraController::class,'store']);
Route::get('/grabadora/mostrar/{id}',[GrabadoraController::class,'show']);
Route::get('/grabadora/actualizar/{id}',[GrabadoraController::class,'edit']);
Route::post('/grabadora/actualizar/{id}',[GrabadoraController::class,'update']);
Route::delete('/grabadora/eliminar/{id}',[GrabadoraController::class,'delete']);

//Rutas Impresoras
Route::post('/impresora/crear',[ImpresoraController::class,'store']); 
Route::get('/impresora/mostrar/{id}',[ImpresoraController::class,'show']);
Route::get('/impresora/actualizar/{id}',[ImpresoraController::class,'edit']);
Route::post('/impresora/actualizar/{id}',[ImpresoraController::class,'update']);
Route::delete('/impresora/eliminar/{id}',[ImpresoraController::class,'delete']);

//Rutas Maquinas Fichar
Route::post('/maquina-fichar/crear',[MaquinaFicharController::class,'store']); 
Route::get('/maquina-fichar/mostrar/{id}',[MaquinaFicharController::class,'show']);
Route::get('/maquina-fichar/actualizar/{id}',[MaquinaFicharController::class,'edit']);
Route::post('/maquina-fichar/actualizar/{id}',[MaquinaFicharController::class,'update']);
Route::delete('/maquina-fichar/eliminar/{id}',[MaquinaFicharController::class,'delete']);

//Rutas Telefonos
Route::post('/telefono/crear',[TelefonosController::class,'store']);  
Route::get('/telefono/mostrar/{id}',[TelefonosController::class,'show']);
Route::get('/telefono/actualizar/{id}',[TelefonosController::class,'edit']);
Route::post('/telefono/actualizar/{id}',[TelefonosController::class,'update']);
Route::delete('/telefono/eliminar/{id}',[TelefonosController::class,'delete']);

//Rutas Departamentos
Route::get('/departamentos',[DepartamentosController::class,'crear']);
Route::post('/departamentos',[DepartamentosController::class,'store']);
Route::get('/zonas',[ZonasController::class,'crear']);
Route::post('/zonas',[ZonasController::class,'store']);


});
