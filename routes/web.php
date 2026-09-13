<?php

use Illuminate\Support\Facades\Route;

// 1. IMPORTAÇÃO DOS CONTROLLERS
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PedidoController;

// Rota inicial padrão do projeto 
Route::get('/', function () {
    return view('welcome');
});

// 2. ROTAS ADMINISTRATIVAS (Somente Admins)
// vai exigir que esteja logado ('auth') E ter perfil de admin ('admin')
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('categorias', CategoriaController::class);
    Route::resource('pizzas', PizzaController::class);
});

// 3. ROTAS DA ÁREA DO CLIENTE (Qualquer Usuário Logado)
// Exige apenas estar logado ('auth')
Route::middleware(['auth'])->group(function () {
    Route::resource('pedidos', PedidoController::class);
});