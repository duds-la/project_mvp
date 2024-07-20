<?php

use App\Http\Controllers\ClienteController;
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