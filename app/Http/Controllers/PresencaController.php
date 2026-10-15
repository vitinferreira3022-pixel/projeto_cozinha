<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presenca;

class PresencaController extends Controller
{
    public function salvar_presenca(Request $request)
    {
        $request->validate([
            'aluno_id' => 'required|integer|exists:aluno,id',
            'data' => 'required|date',
            'funcionario_id' => 'required|integer|exists:funcionario,id',
        ]);

        try {

            $presenca = new Presenca;
            $presenca->aluno_id = $request->aluno_id;
            $presenca->data = $request->data;
            $presenca->funcionario_id = $request->funcionario_id;
            $presenca->save();

            return response()->json(['message' => 'Presença cadastrada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar presença: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_presenca(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $presenca = Presenca::find($request->id);
        if ($presenca) {
            return response()->json(['presenca' => $presenca, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Presença não encontrada.', 'erro' => 's'], 200);
        }
    }

    public function listar_presencas(Request $request)
    {
        $presenca = Presenca::all();

        return response()->json(['presenca' => $presenca, 'erro' => 'n'], 200);
    }

    public function listar_presencas_simples(Request $request)
    {
        $presenca = Presenca::select('id', 'aluno_id', 'data')->get();

        return response()->json(['presenca' => $presenca, 'erro' => 'n'], 200);
    }

    public function alterar_presenca(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:presenca,id',
            'aluno_id' => 'required|integer|exists:aluno,id',
            'data' => 'required|date',
            'funcionario_id' => 'required|integer|exists:funcionario,id',
        ]);

        try {

            $presenca = Presenca::find($request->id);
            $presenca->aluno_id = $request->aluno_id;
            $presenca->data = $request->data;
            $presenca->funcionario_id = $request->funcionario_id;
            $presenca->save();

            return response()->json(['message' => 'Presença alterada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar presença: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_presenca(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:presenca,id',
        ]);

        try {
            $presenca = Presenca::find($request->id);
            $presenca->delete();

            return response()->json(['message' => 'Presença deletada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar presença: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}