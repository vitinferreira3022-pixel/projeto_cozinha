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