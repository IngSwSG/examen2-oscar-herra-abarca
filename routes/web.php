<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController; 

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lista-materiales', [MaterialController::class, 'index'])->name('materiales.lista'); 
Route::post('/materiales', [MaterialController::class, 'store'])->name('materiales.crear');
Route::put('/materiales/{material:codigo}', [MaterialController::class, 'update'])->name('materiales.actualizar');