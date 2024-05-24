<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\TipuUsuariController;
use App\Models\Expedients;
use App\Http\Controllers\ExpedientsController;


Route::get('/', function () {
    return view('login');
});

Route::post('/login', [UsuariController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/inici', function () {
        return view('inici');
    })->name('inici');

    Route::post('/logout', [UsuariController::class, 'logout'])->name('logout');

    Route::get('/carta_trucada', function () {
        return view('carta_trucada');
    })->name('cartaTrucada');

    Route::get('/expedients', [ExpedientsController::class, 'index'])->name('expedients.index');

});



Route::middleware(['auth', 'tipoUsuario'])->group(function () {

    Route::get('/gestion-usuarios', [UsuariController::class, 'index'])->name('gestioUsuaris');

    Route::get('/usuaris/{id}/edit', [UsuariController::class, 'edit'])->name('modificarUsuari');

    Route::get('/usuaris/search', [UsuariController::class, 'search'])->name('usuaris.search');

    Route::delete('/usuaris/{usuari}', [UsuariController::class, 'destroy'])->name('usuaris.destroy');

    Route::put('/usuaris/{id}', [UsuariController::class, 'update'])->name('usuaris.update');

    Route::post('/usuaris', [UsuariController::class, 'store'])->name('usuaris.store');
});

Route::fallback(function () {
    return redirect('/');
});
