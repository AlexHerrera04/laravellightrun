<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TascaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasques.index');
});

Route::resource('tasques', TascaController::class)->except(['show']);
Route::resource('categories', CategoriaController::class)->except(['show']);