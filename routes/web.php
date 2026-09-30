<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\CardapioController;
use App\Http\Controllers\EstoqueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro_aluno', [AlunoController::class, 'aluno_html']);
Route::get('/cadastro_funcionario', [FuncionarioController::class, 'funcionario_html']);
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/cardapio', [CardapioController::class, 'cardapio_html']);
route::get('/cardapio_especial', function () {
    return view('cardapio_especial');
});
Route::get('/sugestoes', function () {
    return view('sugestoes');
});
Route::get('/login_aluno', function () {
    return view('login_aluno');
});
Route::get('/login_funcionario', function () {
    return view('login_funcionario');
});
Route::get('/inicio_aluno', function () {
    return view('inicio_aluno');
});
Route::get('/estoque', [EstoqueController::class, 'estoque_html']);
Route::get('/admin', function () {
    return view('admin');
});
route::get('/inicio_funcionario', function () {
    return view('inicio_funcionario');
});
route::get('/cardapio_funcionario', function () {
    return view('cardapio_funcionario');
});
route::get('/tabela_funcionarios', function () {
    return view('tabela_funcionarios');
});