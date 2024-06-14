<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
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

//Rotas de Produto
Route::prefix('produtos')->group(function () {
    Route::post('/', [ProdutoController::class, 'store']);
    Route::get('/', [ProdutoController::class, 'index']); 
    Route::get('/{id}', [ProdutoController::class, 'show']);
    Route::put('/{id}', [ProdutoController::class, 'update']);
    Route::delete('/{id}', [ProdutoController::class, 'destroy']);
});

//Rotas de Categoria
Route::prefix('categorias')->group(function () {
    Route::post('/', [CategoriaController::class, 'store']);
    Route::get('/', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});


Route::fallback(function () {
    return response()->json(['message' => 'Recurso não encontrado.']);
});
