<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarcasController; 
use App\Http\Controllers\ModelosController; 
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRoll;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/dashboard',  [DashboardController::class, 'index']);

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('get/Botones', [DashboardController::class, 'getBotones']);
    Route::post('nueva/marca', [MarcasController::class, 'create']);
    Route::post('get/marcas', [MarcasController::class, 'index']);
    Route::post('registrar/marca', [MarcasController::class, 'store']);
    Route::post('editar/marca', [MarcasController::class, 'update']);
    Route::post('actualizar/marca', [MarcasController::class, 'store']);
    Route::post('eliminar/marca', [MarcasController::class, 'store']);

    /* Modelos */
    Route::post('nuevo/modelo', [ModelosController::class, 'create']);
    Route::post('get/modelos', [ModelosController::class, 'index']);
    Route::post('registrar/modelo', [ModelosController::class, 'store']);
    Route::post('editar/modelo', [ModelosController::class, 'update']);
    Route::post('actualizar/modelo', [ModelosController::class, 'store']);
    Route::post('eliminar/modelo', [ModelosController::class, 'store']);
    /* Fin Modelos */
});
//check del roll de usuario
Route::middleware([CheckRoll::class])->group(function () {

    Route::post('nuevo/usuario', [UserController::class, 'create']);
    Route::post('get/usuarios', [UserController::class, 'listaUsuarios']);
    Route::post('registrar/usuario', [UserController::class, 'store']);
    Route::post('editar/usuario', [UserController::class, 'update']);
    Route::post('actualizar/usuario', [UserController::class, 'store']);
    Route::post('eliminar/usuario', [UserController::class, 'store']);
    Route::post('desactivar/usuario', [UserController::class, 'store']);
    Route::post('activar/usuario', [UserController::class, 'store']);
});
//fin check del roll de usuario
