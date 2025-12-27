<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Rutas de autenticación
Route::get('/', [AuthController::class, 'showLoginForm']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');

// Ruta protegida del dashboard - verifica autenticación mediante middleware
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth:sanctum')
    ->name('dashboard');
