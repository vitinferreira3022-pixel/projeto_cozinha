<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\FuncionarioToken;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        $request->validate([
            'funcionario_id' => 'required|integer',
            'token'          => 'required|string',
        ]);

        try {
            $deletado = FuncionarioToken::where('funcionario_id', $request->funcionario_id)
                ->where('token', $request->token)
                ->delete();

            if ($deletado) {
                return response()->json(['message' => 'Logout realizado com sucesso!', 'erro' => 'n'], 200);
            }

            return response()->json(['message' => 'Token não encontrado', 'erro' => 's'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao realizar logout: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function promover_admin(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
        ]);

        try {
            Admin::firstOrCreate(['funcionario_id' => $request->id]);

            return response()->json(['message' => 'Funcionário promovido a admin!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao promover admin: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function remover_admin(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:funcionario,id',
        ]);

        try {
            Admin::where('funcionario_id', $request->id)->delete();

            return response()->json(['message' => 'Admin removido!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao remover admin: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}