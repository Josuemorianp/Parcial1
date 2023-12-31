<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('usuarios', UsuariosController::class);
// Route::prefix('/usuarios')->group(function () {
//     Route::get('/', [UsuarioController::class, 'index']);
//     Route::get('/{id}', [UsuarioController::class, 'show']);
//     Route::post('/', [UsuarioController::class, 'store']);
//     Route::put('/{id}', [UsuarioController::class, 'update']);
//     Route::delete('/{id}', [UsuarioController::class, 'destroy']);
// });
