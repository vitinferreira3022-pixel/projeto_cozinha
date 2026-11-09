<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\FuncionarioToken;
use App\Models\Usuario;

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
        public function login(Request $Request){
            $Request->validate([
                'email' => 'required',
                'senha' => 'required',
            ]);
            $funcionario = Funcionario::where('email', '=', $Request->email)->first();
            if($funcionario){
                if(Hash::check($Request->senha, $funcionario->senha)){
                    $funcionario_token = new FuncionarioToken();
                    $funcionario_token->funcionario_id = $funcionario->id;
                    $funcionario_token->token = Hash::make($funcionario->id . $funcionario->email . now());
                    $funcionario_token->valido_ate = now()->addDays(7);
                    $funcionario_token->save();
                    return response()->json(['message' => 'Login realizado com sucesso!', 'erro' => 'n', 'token' => $funcionario_token->token], 200);

                }else{
                    return response()->json(['message' => 'Funcionário ou senha incorretos', 'erro' => 's'], 200);
                }
            }else{
                return response()->json(['message' => 'Email não encontrado', 'erro' => 's'], 200);
            }
        }

        public function logout_funcionario(Request $request){
            FuncionarioToken::where('funcionario_id', $request->funcionario_id)
                ->where('token', $request->token)
                ->delete();
            return response()->json(['message' => 'Logout realizado com sucesso','erro' => 'n'], 200);
        }
    }