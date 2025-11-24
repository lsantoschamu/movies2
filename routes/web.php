<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitulacionesController;

Route::get('/', function () {
    return view('layouts.app');
});

// ✅ Rutas actualizadas con {titulacion} en lugar de {id}
Route::get('/titulaciones', [TitulacionesController::class, 'index'])->name('titulaciones.index');
Route::get('/titulaciones/create', [TitulacionesController::class, 'create'])->name('titulaciones.create');
Route::post('/titulaciones', [TitulacionesController::class, 'store'])->name('titulaciones.store');
Route::get('/titulaciones/{titulacion}', [TitulacionesController::class, 'show'])->name('titulaciones.show');
Route::get('/titulaciones/{titulacion}/edit', [TitulacionesController::class, 'edit'])->name('titulaciones.edit');
Route::put('/titulaciones/{titulacion}', [TitulacionesController::class, 'update'])->name('titulaciones.update');
Route::delete('/titulaciones/{titulacion}', [TitulacionesController::class, 'destroy'])->name('titulaciones.destroy');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
});

require __DIR__.'/auth.php';