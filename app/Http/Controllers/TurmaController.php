<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
    public function salvar_turma(Request $request)
    {
        $request->validate([
            'serie' => 'required|string|max:255',
        ]);

        try {

            $turma = new Turma;
            $turma->serie = $request->serie;
            $turma->save();

            return response()->json(['message' => 'Turma cadastrada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar turma: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_turma(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $turma = Turma::find($request->id);
        if ($turma) {
            return response()->json(['turma' => $turma, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Turma não encontrada.', 'erro' => 's'], 200);
        }
    }

    public function listar_turmas(Request $request)
    {
        $turma = Turma::all();

        return response()->json(['turma' => $turma, 'erro' => 'n'], 200);
    }

    public function listar_turmas_simples(Request $request)
    {
        $turma = Turma::select('id', 'serie')->get();

        return response()->json(['turma' => $turma, 'erro' => 'n'], 200);
    }

    public function alterar_turma(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:turma,id',
            'serie' => 'required|string|max:255',
        ]);

        try {

            $turma = Turma::find($request->id);
            $turma->serie = $request->serie;
            $turma->save();

            return response()->json(['message' => 'Turma alterada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar turma: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_turma(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:turma,id',
        ]);

        try {
            $turma = Turma::find($request->id);
            $turma->delete();

            return response()->json(['message' => 'Turma deletada com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar turma: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}