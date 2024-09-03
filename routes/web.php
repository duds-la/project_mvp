<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteGraficoController;
use App\Http\Controllers\PesquisaClienteController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('teste');
});

Route::prefix('/cliente')->group(function () {
    Route::controller(ClienteController::class)->group(function () {
        Route::get('/', 'index')->name('cliente.index');
        Route::get('/cadastrar-cliente', 'create')->name('cliente.create');
        Route::post('/', 'store')->name('cliente.store');
    });
});

Route::prefix('/pesquisa-cliente')->group(function () {
    Route::controller(PesquisaClienteController::class, 'pesquisa-cliente')->group(function () {
        Route::get('/', 'pesquisaClienteMultiplosCampos')->name('pesquisa-cliente.pesquisa-cliente');
        Route::get('/pesquisa-cliente-cnpj', 'pesquisaClientePorCnpj')->name('pesquisa-cliente.pesquisa-cliente-cnpj');
    });
});

Route::prefix('/cliente-grafico')->group(function () {
    Route::controller(ClienteGraficoController::class, 'cliente-grafico')->group(function () {
        Route::get('/grafico-cadastro', 'graficosCadastro')->name('cliente-grafico.grafico-cadastro');
    });
});
