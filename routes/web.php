<?php

use App\Http\Controllers\MotoristaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

"Auth"::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('veiculos', App\Http\Controllers\VeiculoController::class);
route::resource("motoristas",MotoristaController::class);
