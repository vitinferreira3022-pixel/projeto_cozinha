<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FuncionarioController extends Controller
{

    public function funcionario_html(Request $request)
    {
        return view('cadastro_funcionario');
    }

    public function salvar_funcionario(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:funcionario,email',
            'senha' => 'required|string',
            'cpf' => 'required|string|max:14|unique:funcionario,cpf',
            'nif' => 'required|string|max:9|unique:funcionario,nif',
            'data_nascimento' => 'required',
        ]);

        try {

            $funcionario = new Funcionario;
            $funcionario->nome = $request->nome;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->cpf = $request->cpf;
            $funcionario->nif = $request->nif;
            $funcionario->data_nascimento = $request->data_nascimento;
            $funcionario->save();

            return response()->json(['message' => 'Funcionário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_funcionario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $funcionario = Funcionario::find($request->id);
        if ($funcionario) {
            return response()->json(['funcionario' => $funcionario, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Funcionário não encontrado.', 'erro' => 's'], 200);
        }
    }

    public function listar_funcionarios(Request $request)
    {
        $funcionario = Funcionario::all();

        return response()->json(['funcionario' => $funcionario, 'erro' => 'n'], 200);
    }

    public function listar_funcionarios_simples(Request $request)
    {
        $funcionario = Funcionario::select('id', 'nome', 'email')->get();

        return response()->json(['funcionario' => $funcionario, 'erro' => 'n'], 200);
    }

    public function alterar_funcionario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'senha' => 'required|string',
            'cpf' => 'required|string|max:14',
            'nif' => 'required|string|max:9',
            'data_nascimento' => 'required',
        ]);

        try {

            $funcionario = Funcionario::find($request->id);
            if($funcionario->cpf != $request->cpf){
                $funcionario_cpf_igual = Usuario::where('cpf', $request->cpf)->first();
                if($funcionario_cpf_igual){
                    return response()->json(['message' => 'CPF já cadastrado', 'erro' => 's'], 200);
                }
            }
            if($funcionario->email != $request->email){
                $funcionario_email_igual = Usuario::where('email', $request->email)->first();
                if($funcionario_email_igual){
                    return response()->json(['message' => 'Email já cadastrado', 'erro' => 's'], 200);
                }
            }
            $funcionario->nome = $request->nome;
            $funcionario->email = $request->email;
            $funcionario->senha = Hash::make($request->senha);
            $funcionario->cpf = $request->cpf;
            $funcionario->nif = $request->nif;
            $funcionario->data_nascimento = $request->data_nascimento;
            $funcionario->save();

            return response()->json(['message' => 'Funcionário cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_funcionario(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
        ]);

        try {
            $funcionario = Funcionario::find($request->id);
            $funcionario->delete();

            return response()->json(['message' => 'Funcionário deletado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar funcionário: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
 }