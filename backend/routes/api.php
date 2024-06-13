<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\ContaController;
use App\Http\Controllers\Api\TransferenciaController;
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

//Contas e Transferencias
Route::post('/conta', [ContaController::class, 'create']);
Route::get('/conta/{id}', [ContaController::class, 'find']);
Route::post('/transferencia', [TransferenciaController::class, 'create']);


Route::fallback(function () {
    return response()->json(['message' => 'Recurso não encontrado.']);
});
