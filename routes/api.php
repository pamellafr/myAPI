<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandController;

Route::get('/users/{name}', function ($name) {
    return "hello " . $name;
});

// Rota para retornar todas as bandas
Route::get('/bands', [BandController::class, 'getAll']);

// Rota para retornar uma banda pelo ID
Route::get('/bands/{id}', [BandController::class, 'getById']);

// Rota para retornar o gênero de uma banda pelo ID
Route::get('/bands/gender/{id}', [BandController::class, 'getGenreById']);

// Rota para retornar o gênero de uma banda pelo ID
Route::post('/bands/store', [BandController::class, 'store']);


