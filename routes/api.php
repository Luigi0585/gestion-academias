<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Rutas públicas (no requieren token).
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas (requieren Token de Sanctum).
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // CRUD completo de Academias protegido por autenticación
    Route::apiResource('academies', AcademyController::class);
});