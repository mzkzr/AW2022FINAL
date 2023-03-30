<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProvinciumController;
use App\Http\Controllers\API\LocalidadController;
use App\Http\Controllers\API\ProductorController;
use App\Http\Controllers\API\CerveceriumController;
use App\Http\Controllers\API\CervezaController;
use App\Http\Controllers\API\PuntoVentumController;

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

  
Route::get('login', [AuthController::class, 'signin']);
Route::post('register', [AuthController::class, 'signup']);

Route::resource('provincias', ProvinciumController::class);
Route::resource('localidades', LocalidadController::class);
Route::resource('productores', ProductorController::class);
Route::resource('cervecerias', CerveceriumController::class);
Route::resource('cervezas', CervezaController::class);
Route::resource('puntos_venta', PuntoVentumController::class);