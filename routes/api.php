<?php

use App\Http\Controllers\DetalleSalidaController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ReporteSalidaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1/productos')->group(function(){
    Route::get('/', [ProductosController::class,'getAll']);
    Route::get('/{valor}',[ProductosController::class,'listSkuNombre']);
    Route::post('/', [ProductosController::class,'create']);
    Route::put('/{id}', [ProductosController::class,'update']);
    Route::patch('actualizaStock/{id}/{salida}', [ProductosController::class,'updateStock']);
});

Route::prefix('v1/detalleSalida')->group(function(){
    Route::get('/', [DetalleSalidaController::class,'getAll']);
    Route::post('/', [DetalleSalidaController::class,'create']);
    Route::put('/{id}', [DetalleSalidaController::class,'update']);
});

Route::prefix('v1/reporteSalida')->group(function(){
    Route::get('/', [ReporteSalidaController::class,'getAll']);
    Route::post('/', [ReporteSalidaController::class,'create']);
    Route::patch('/{id}', [ReporteSalidaController::class,'update']);
});
