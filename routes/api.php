<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PoblacionController;
use App\Http\Controllers\EleccionController;
use App\Http\Controllers\ComiteElectoralController;
use App\Http\Controllers\AsociarTitularSuplenteController;
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


Route::post('/asignar-vocales/{COD_COMITE}', [PoblacionController::class, 'asignarVocales']);
Route::get('/elecciones', [EleccionController::class, 'index']);

Route::put('/asignar-comite/{COD_ELECCION}', [ComiteElectoralController::class, 'asignarComite']);


Route::get('/ver-lista-comite/{idComite}', [AsociarTitularSuplenteController::class, 'verListaComite']);




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
