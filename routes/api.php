<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\PedidosController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index']);
    Route::post('/', [ProdutosController::class, 'store']);
    Route::get('/{id}', [ProdutosController::class, 'show']);
    Route::put('/{id}', [ProdutosController::class, 'update']);
    Route::delete('/{id}', [ProdutosController::class, 'destroy']);
});

Route::prefix('pedidos')->group(function () {
    Route::get('/', [PedidosController::class, 'index']);
    Route::post('/', [PedidosController::class, 'store']);
    Route::get('/{id}', [PedidosController::class, 'show']);
    Route::put('/{id}', [PedidosController::class, 'update']);
    Route::delete('/{id}', [PedidosController::class, 'destroy']);
});

