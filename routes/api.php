<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EleccionController;
use App\Models\Eleccion;

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

Route::get('/procesoElectoral', [EleccionController::class, 'index'])->name('procesoElectoral');
Route::post('/procesoElectoral/nuevo', [EleccionController::class, 'store'])->name('procesoElectoral');
Route::get('/procesoElectoral/{id}', [EleccionController::class, 'show'])->name('procesoElectoral-edit');
Route::patch('/procesoElectoral/{id}', [EleccionController::class, 'update'])->name('procesoElectoral-update');
