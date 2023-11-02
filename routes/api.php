<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentosController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\ProcesosController;
use App\Http\Controllers\ConsecutivosController;

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

Route::resources([
        'documentos' => DocumentosController::class,
        'tipos' => TiposController::class,
        'procesos' => ProcesosController::class,
        'consecutivos' => ConsecutivosController::class
    ]);




