<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;

class AlimentoController extends Controller
{
    public function salvar_alimento(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'unidade_medida' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        try {

            $alimento = new Alimento;
            $alimento->nome = $request->nome;
            $alimento->unidade_medida = $request->unidade_medida;
            $alimento->descricao = $request->descricao;
            $alimento->save();

            return response()->json(['message' => 'Alimento cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar alimento: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_alimento(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $alimento = Alimento::find($request->id);
        if ($alimento) {
            return response()->json(['alimento' => $alimento, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Alimento não encontrado.', 'erro' => 's'], 200);
        }
    }

    public function listar_alimentos(Request $request)
    {
        $alimento = Alimento::all();

        return response()->json(['alimento' => $alimento, 'erro' => 'n'], 200);
    }

    public function listar_alimentos_simples(Request $request)
    {
        $alimento = Alimento::select('id', 'nome', 'unidade_medida')->get();

        return response()->json(['alimento' => $alimento, 'erro' => 'n'], 200);
    }

    public function alterar_alimento(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:alimento,id',
            'nome' => 'required|string|max:255',
            'unidade_medida' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
        ]);

        try {

            $alimento = Alimento::find($request->id);
            $alimento->nome = $request->nome;
            $alimento->unidade_medida = $request->unidade_medida;
            $alimento->descricao = $request->descricao;
            $alimento->save();

            return response()->json(['message' => 'Alimento alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar alimento: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_alimento(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:alimento,id',
        ]);

        try {
            $alimento = Alimento::find($request->id);
            $alimento->delete();

            return response()->json(['message' => 'Alimento deletado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar alimento: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}