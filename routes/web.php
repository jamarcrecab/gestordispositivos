<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DispositivosController;
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
Route::post('/dispositivos/crear', [DispositivosController::class,'store']);
Route::get('/dispositivos/editar/{id}',[DispositivosController::class,'editar']);
Route::get('/dispositivos/mostrar/{id}', [DispositivosController::class,'mostrar']);
Route::post('/dispositivos/editar/{id}',[DispositivosController::class,'actualizar']);
Route::delete('/dispositivos/borrar/{id}',[DispositivosController::class,'eliminar']);

Route::post('/test', function(){

    return redirect()->back()->with('mensaje','Dispositivo');

});



});
