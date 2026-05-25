<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');


Route::middleware('auth:sanctum')->group(function () {  

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
        Route::get('/{id}', [PedidosController::class, 'show'])->whereNumber('id');
        Route::put('/{id}', [PedidosController::class, 'update'])->middleware('pedido.owner')->whereNumber('id');
        Route::delete('/{id}', [PedidosController::class, 'destroy'])->middleware('pedido.owner')->whereNumber('id');
    });

});