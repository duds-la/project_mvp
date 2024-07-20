<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteGraficoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('teste');
});

Route::prefix('/cliente')->group(function () {
    Route::controller(ClienteController::class)->group(function () {
        Route::get('/', 'index')->name('cliente.index');

    });
});

Route::prefix('/cliente-grafico')->group(function () {
    Route::controller(ClienteGraficoController::class, 'cliente-grafico')->group(function () {
        Route::get('/grafico-cadastro', 'graficosCadastro')->name('cliente-grafico.grafico-cadastro');
    });
});