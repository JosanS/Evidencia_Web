<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\AuthController;

// Public routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/search', [OrdenController::class, 'search'])->name('search.invoice');

// Protected routes for registered usuarios
//Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User management routes
    Route::prefix('usuarios')->group(function () {
        Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');
        Route::post('/', [UsuarioController::class, 'store'])->name('usuarios.store');
        Route::get('/{id}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::patch('/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
    });

    // Orden management routes
    Route::prefix('ordenes')->group(function () {
        Route::get('/', [OrdenController::class, 'index'])->name('ordenes.index');
        Route::get('/create', [OrdenController::class, 'create'])->name('ordenes.create');
        Route::post('/', [OrdenController::class, 'store'])->name('ordenes.store');
        Route::get('/{id}/edit', [OrdenController::class, 'edit'])->name('ordenes.edit');
        Route::patch('/{id}', [OrdenController::class, 'update'])->name('ordenes.update');
        Route::get('/{id}', [OrdenController::class, 'show'])->name('ordenes.show');
        Route::delete('/{id}', [OrdenController::class, 'destroy'])->name('ordenes.destroy');
    });

    // Archived ordenes routes
    Route::get('/archived', [OrdenController::class, 'archived'])->name('ordenes.archived');
    Route::patch('{id}/restore', [OrdenController::class, 'restore'])->name('ordenes.restore');
//});

// Auth routes (if using built-in authentication)
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.submit');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

