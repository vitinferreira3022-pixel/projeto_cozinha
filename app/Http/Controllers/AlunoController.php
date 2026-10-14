<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    public function aluno_html(Request $request)
    {
        return view('cadastro_aluno');
    }

    public function salvar_aluno(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:aluno,email',
            'RM' => 'required|string|max:5|unique:aluno,RM',
            'cpf' => 'required|string|max:14|unique:aluno,cpf',
            'data_nascimento' => 'required',
            'turma_id' => 'required|integer|exists:turma,id',
        ]);

        try {

            $aluno = new Aluno;
            $aluno->nome = $request->nome;
            $aluno->email = $request->email;
            $aluno->cpf = $request->cpf;
            $aluno->RM = $request->RM;
            $aluno->data_nascimento = $request->data_nascimento;
            $aluno->turma_id = $request->turma_id;
            $aluno->save();

            return response()->json(['message' => 'Aluno cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar aluno: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_aluno(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $aluno = Aluno::find($request->id);
        if ($aluno) {
            return response()->json(['aluno' => $aluno, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Aluno não encontrado.', 'erro' => 's'], 200);
        }
    }

    public function listar_alunos(Request $request)
    {
        $aluno = Aluno::all();

        return response()->json(['aluno' => $aluno, 'erro' => 'n'], 200);
    }

    public function listar_alunos_simples(Request $request)
    {
        $aluno = Aluno::select('id', 'nome', 'email')->get();

        return response()->json(['aluno' => $aluno, 'erro' => 'n'], 200);
    }

    public function alterar_aluno(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:aluno,id',
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'RM' => 'required|string|max:5',
            'cpf' => 'required|string|max:14',
            'data_nascimento' => 'required',
            'turma_id' => 'required|integer|exists:turma,id',
        ]);

        try {

            $aluno = Aluno::find($request->id);
            if($aluno->cpf != $request->cpf){
                $aluno_cpf_igual = Aluno::where('cpf', $request->cpf)->first();
                if($aluno_cpf_igual){
                    return response()->json(['message' => 'CPF já cadastrado', 'erro' => 's'], 200);
                }
            }
            if($aluno->email != $request->email){
                $aluno_email_igual = Aluno::where('email', $request->email)->first();
                if($aluno_email_igual){
                    return response()->json(['message' => 'Email já cadastrado', 'erro' => 's'], 200);
                }
            }
            $aluno->nome = $request->nome;
            $aluno->email = $request->email;
            $aluno->RM = $request->RM;
            $aluno->cpf = $request->cpf;
            $aluno->data_nascimento = $request->data_nascimento;
            $aluno->turma_id = $request->turma_id;
            $aluno->save();

            return response()->json(['message' => 'Aluno cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar aluno: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_aluno(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:aluno,id',
        ]);

        try {
            $aluno = Aluno::find($request->id);
            $aluno->delete();

            return response()->json(['message' => 'Aluno deletado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar aluno: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}
