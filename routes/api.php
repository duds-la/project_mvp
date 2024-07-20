<?php

use App\Http\Controllers\ClienteGraficoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 12;
});



Route::controller(ClienteGraficoController::class, 'grafico-cliente')->group(function () {
    Route::get('/grafico-cadastro', 'graficosCadastro')->name('grafico-cadastro');
});