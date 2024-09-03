<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PesquisaClienteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 12;
});

Route::controller(ClienteController::class, 'cliente')->group(function () {
    Route::get('/cliente', 'index')->name('cliente.index');
    Route::post('/cliente/store', 'store')->name('cliente.store');
});

Route::controller(PesquisaClienteController::class, 'pesquisa-cliente')->group(function () {
    Route::get('/pesquisa-cliente', 'pesquisaClienteMultiplosCampos')->name('pesquisa-cliente.pesquisa-cliente');
    Route::get('/pesquisa-cliente-cnpj', 'pesquisaClientePorCnpj')->name('pesquisa-cliente.pesquisa-cliente-cnpj');
});

