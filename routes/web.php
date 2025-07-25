<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CanalController;
use App\Http\Controllers\SiteController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/canais/select', function () {
        return view('canais.select');
    })->name('canais.select');

    Route::post('/canais/store', [CanalController::class, 'store'])->name('canais.store');
    Route::get('/canais', [CanalController::class, 'index'])->name('canais.index');
    Route::post('/canais/data', [CanalController::class, 'data'])->name('canais.data');
    Route::get('/canais/{id}/edit', [CanalController::class, 'edit'])->name('canais.edit');
    Route::delete('/canais/{id}', [CanalController::class, 'destroy'])->name('canais.destroy');

    Route::post('/canais/update', [CanalController::class, 'update'])->name('canais.update');

    //Clientes
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/cliente/listar', [ClienteController::class, 'listar'])->name('cliente.listar');
});

Route::get('/site', [SiteController::class, 'index'])->name('site.home');

require __DIR__.'/auth.php';



