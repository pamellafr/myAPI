<?php

use Illuminate\Support\Facades\Route;

// Rota padrão que retorna a visualização welcome
Route::get('/', function () {
    return view('welcome');
});

