<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AdminUserController;

Route::middleware('auth')->group(function () {
        Route::resource('usuarios', AdminUserController::class);
});


Route::post('/prestamos/{id}/devolver', [PrestamoController::class, 'devolver'])->name('prestamos.devolver');


Route::resource('users', UsuarioController::class);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rutas para gestionar libros y préstamos
    Route::resource('libros', LibroController::class)->except(['show']);
    Route::resource('prestamos', PrestamoController::class)->except(['show']);
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

Route::middleware(['auth', 'role:bibliotecario'])->group(function () {
    Route::get('/bibliotecario', [DashboardController::class, 'bibliotecarioDashboard'])->name('bibliotecario.dashboard');
});

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
