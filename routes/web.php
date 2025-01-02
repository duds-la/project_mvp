<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteGraficoController;
use App\Http\Controllers\PesquisaClienteController;
use App\Http\Controllers\PesquisaTipoServicoController;
use App\Http\Controllers\TipoProdutoController;
use App\Http\Controllers\TipoServicoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('teste');
});

Route::prefix('/cliente')->group(function () {
    Route::controller(ClienteController::class)->group(function () {
        Route::get('/', 'index')->name('cliente.index');
        Route::get('/cadastrar-cliente', 'create')->name('cliente.create');
        Route::get('/{id}', 'show')->name('cliente.show');
        Route::put('/atualizar/{id}', 'update')->name('cliente.update');
        Route::post('/', 'store')->name('cliente.store');
        Route::delete('/{id}', 'destroy')->name('cliente.destroy');
    });
});

Route::prefix('/pesquisa-cliente')->group(function () {
    Route::controller(PesquisaClienteController::class, 'pesquisa-cliente')->group(function () {
        Route::get('/', 'pesquisaClienteMultiplosCampos')->name('pesquisa-cliente.pesquisa-cliente');
        Route::get('/pesquisa-cliente-cnpj', 'pesquisaClientePorCnpj')->name('pesquisa-cliente.pesquisa-cliente-cnpj');
    });
});

Route::prefix('/pesquisa-tipo-servico')->group(function () {
    Route::controller(PesquisaTipoServicoController::class, 'pesquisa-tipo-servico')->group(function () {
        Route::get('/', 'pesquisaTipoServicoMultiplosCampos')->name('pesquisa-tipo-servico.pesquisa-tipo-servico');
    });
});

Route::prefix('/cliente-grafico')->group(function () {
    Route::controller(ClienteGraficoController::class, 'cliente-grafico')->group(function () {
        Route::get('/grafico-cadastro', 'graficosCadastro')->name('cliente-grafico.grafico-cadastro');
    });
});

Route::prefix('/tipo-servico')->group(function () {
    Route::controller(TipoServicoController::class)->group(function () {
        Route::get('/', 'index')->name('tipo-servico.index');
        Route::get('/cadastrar-tipo-servico', 'create')->name('tipo-servico.create');
        Route::get('/{id}', 'show')->name('tipo-servico.show');
        Route::put('/atualizar/{id}', 'update')->name('tipo-servico.update');
        Route::post('/', 'store')->name('tipo-servico.store');
        Route::delete('/{id}', 'destroy')->name('tipo-servico.destroy');
    });
});

Route::prefix('/tipo-produto')->group(function () {
    Route::controller(TipoProdutoController::class)->group(function () {
        Route::get('/', 'index')->name('tipo-produto.index');
        Route::get('/cadastrar-tipo-produto', 'create')->name('tipo-produto.create');
        Route::get('/{id}', 'show')->name('tipo-produto.show');
        Route::put('/atualizar/{id}', 'update')->name('tipo-produto.update');
        Route::post('/', 'store')->name('tipo-produto.store');
        Route::delete('/{id}', 'destroy')->name('tipo-produto.destroy');
    });
});
