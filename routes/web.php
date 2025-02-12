<?php

use App\Http\Controllers\MotoristaController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rota para login
Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Rota para o dashboard
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('motoristas/{id}/documentos', [MotoristaController::class, 'documentos'])->name('motoristas.documentos');


// Rotas de recursos
Route::resource('veiculos', VeiculoController::class);
Route::resource('monitores', MonitorController::class);
Route::resource('motoristas', MotoristaController::class);  
Route::resource('users', UserController::class);

// Rota para exibir PDFs diretamente pelo storage
Route::get('/motoristas/curso/{file}', function ($file) {
    $path = storage_path("app/public/motoristas_cursos/$file");

    if (!file_exists($path)) {
        abort(404, "Arquivo não encontrado.");
    }

    return response()->file($path);
})->name('motoristas.curso');
