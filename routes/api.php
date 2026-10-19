<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/funcionario_cadastro', [App\Http\Controllers\FuncionarioController::class, 'salvar_funcionario']);
Route::get('/ver_funcionario', [App\Http\Controllers\FuncionarioController::class, 'ver_funcionario']);
Route::get('/listar_funcionarios', [App\Http\Controllers\FuncionarioController::class, 'listar_funcionarios']);
Route::get('/listar_funcionarios_simples', [App\Http\Controllers\FuncionarioController::class, 'listar_funcionarios_simples']);
Route::put('/alterar_funcionario', [App\Http\Controllers\FuncionarioController::class, 'alterar_funcionario']);
Route::delete('/deletar_funcionario', [App\Http\Controllers\FuncionarioController::class, 'deletar_funcionario']);

Route::post('/salvar_aluno', [App\Http\Controllers\AlunoController::class, 'salvar_aluno']);
Route::get('/ver_aluno', [App\Http\Controllers\AlunoController::class, 'ver_aluno']);
Route::get('/listar_alunos', [App\Http\Controllers\AlunoController::class, 'listar_alunos']);
Route::get('/listar_alunos_simples', [App\Http\Controllers\AlunoController::class, 'listar_alunos_simples']);
Route::put('/alterar_aluno', [App\Http\Controllers\AlunoController::class, 'alterar_aluno']);
Route::delete('/deletar_aluno', [App\Http\Controllers\AlunoController::class, 'deletar_aluno']);

Route::post('/salvar_alimento', [App\Http\Controllers\AlimentoController::class, 'salvar_alimento']);
Route::get('/ver_alimento', [App\Http\Controllers\AlimentoController::class, 'ver_alimento']);
Route::get('/listar_alimentos', [App\Http\Controllers\AlimentoController::class, 'listar_alimentos']);
Route::get('/listar_alimentos_simples', [App\Http\Controllers\AlimentoController::class, 'listar_alimentos_simples']);
Route::put('/alterar_alimento', [App\Http\Controllers\AlimentoController::class, 'alterar_alimento']);
Route::delete('/deletar_alimento', [App\Http\Controllers\AlimentoController::class, 'deletar_alimento']);

Route::post('/salvar_estoque', [App\Http\Controllers\EstoqueController::class, 'salvar_estoque']);
Route::get('/ver_estoque', [App\Http\Controllers\EstoqueController::class, 'ver_estoque']);
Route::get('/listar_estoques', [App\Http\Controllers\EstoqueController::class, 'listar_estoques']);
Route::get('/listar_estoques_simples', [App\Http\Controllers\EstoqueController::class, 'listar_estoques_simples']);
Route::put('/alterar_estoque', [App\Http\Controllers\EstoqueController::class, 'alterar_estoque']);
Route::delete('/deletar_estoque', [App\Http\Controllers\EstoqueController::class, 'deletar_estoque']);

Route::post('/salvar_desperdicio', [App\Http\Controllers\DesperdicioController::class, 'salvar_desperdicio']);
Route::get('/ver_desperdicio', [App\Http\Controllers\DesperdicioController::class, 'ver_desperdicio']);
Route::get('/listar_desperdicios', [App\Http\Controllers\DesperdicioController::class, 'listar_desperdicios']);
Route::get('/listar_desperdicios_simples', [App\Http\Controllers\DesperdicioController::class, 'listar_desperdicios_simples']);
Route::put('/alterar_desperdicio', [App\Http\Controllers\DesperdicioController::class, 'alterar_desperdicio']);
Route::delete('/deletar_desperdicio', [App\Http\Controllers\DesperdicioController::class, 'deletar_desperdicio']);

Route::post('/salvar_turma', [App\Http\Controllers\TurmaController::class, 'salvar_turma']);
Route::get('/ver_turma', [App\Http\Controllers\TurmaController::class, 'ver_turma']);
Route::get('/listar_turmas', [App\Http\Controllers\TurmaController::class, 'listar_turmas']);
Route::get('/listar_turmas_simples', [App\Http\Controllers\TurmaController::class, 'listar_turmas_simples']);
Route::put('/alterar_turma', [App\Http\Controllers\TurmaController::class, 'alterar_turma']);
Route::delete('/deletar_turma', [App\Http\Controllers\TurmaController::class, 'deletar_turma']);