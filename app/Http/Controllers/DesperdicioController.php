<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Desperdicio;

class DesperdicioController extends Controller
{
    public function salvar_desperdicio(Request $request)
    {
        $request->validate([
            'desperdicio_manha' => 'required|string|max:255',
            'desperdicio_almoco' => 'required|string|max:255',
            'desperdicio_tarde' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
        ]);

        try {

            $desperdicio = new Desperdicio;
            $desperdicio->desperdicio_manha = $request->desperdicio_manha;
            $desperdicio->desperdicio_almoco = $request->desperdicio_almoco;
            $desperdicio->desperdicio_tarde = $request->desperdicio_tarde;
            $desperdicio->motivo = $request->motivo;
            $desperdicio->save();

            return response()->json(['message' => 'Desperdício cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar desperdício: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_desperdicio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $desperdicio = Desperdicio::find($request->id);
        if ($desperdicio) {
            return response()->json(['desperdicio' => $desperdicio, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Desperdício não encontrado.', 'erro' => 's'], 200);
        }
    }

    public function listar_desperdicios(Request $request)
    {
        $desperdicio = Desperdicio::all();

        return response()->json(['desperdicio' => $desperdicio, 'erro' => 'n'], 200);
    }

    public function listar_desperdicios_simples(Request $request)
    {
        $desperdicio = Desperdicio::select('id', 'desperdicio_manha', 'desperdicio_almoco', 'desperdicio_tarde')->get();

        return response()->json(['desperdicio' => $desperdicio, 'erro' => 'n'], 200);
    }

    public function alterar_desperdicio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:desperdicio,id',
            'desperdicio_manha' => 'required|string|max:255',
            'desperdicio_almoco' => 'required|string|max:255',
            'desperdicio_tarde' => 'required|string|max:255',
            'motivo' => 'required|string|max:255',
        ]);

        try {

            $desperdicio = Desperdicio::find($request->id);
            $desperdicio->desperdicio_manha = $request->desperdicio_manha;
            $desperdicio->desperdicio_almoco = $request->desperdicio_almoco;
            $desperdicio->desperdicio_tarde = $request->desperdicio_tarde;
            $desperdicio->motivo = $request->motivo;
            $desperdicio->save();

            return response()->json(['message' => 'Desperdício alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar desperdício: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_desperdicio(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:desperdicio,id',
        ]);

        try {
            $desperdicio = Desperdicio::find($request->id);
            $desperdicio->delete();

            return response()->json(['message' => 'Desperdício deletado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar desperdício: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}