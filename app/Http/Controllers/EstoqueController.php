<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estoque;

class EstoqueController extends Controller
{
    public function estoque_html(Request $request)
    {
        return view('estoque');
    }

    public function salvar_estoque(Request $request)
    {
        $request->validate([
            'alimento_id' => 'required|integer|exists:alimento,id',
            'quantidade' => 'required|integer|min:0',
            'data_fabricacao' => 'required|date',
            'data_validade' => 'required|date|after_or_equal:data_fabricacao',
            'funcionario_id' => 'required|integer|exists:funcionario,id',
        ]);

        try {

            $estoque = new Estoque;
            $estoque->alimento_id = $request->alimento_id;
            $estoque->quantidade = $request->quantidade;
            $estoque->data_fabricacao = $request->data_fabricacao;
            $estoque->data_validade = $request->data_validade;
            $estoque->funcionario_id = $request->funcionario_id;
            $estoque->save();

            return response()->json(['message' => 'Estoque cadastrado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao cadastrar estoque: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function ver_estoque(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);
        $estoque = Estoque::with(['alimento:id,nome,unidade_medida', 'funcionario:id,nome'])->find($request->id);
        if ($estoque) {
            return response()->json(['estoque' => $estoque, 'erro' => 'n'], 200);
        } else {
            return response()->json(['message' => 'Estoque não encontrado.', 'erro' => 's'], 200);
        }
    }

    public function listar_estoques(Request $request)
    {
        $estoque = Estoque::with(['alimento:id,nome,unidade_medida', 'funcionario:id,nome'])->get();

        return response()->json(['estoque' => $estoque, 'erro' => 'n'], 200);
    }

    public function listar_estoques_simples(Request $request)
    {
        $estoque = Estoque::select('id', 'alimento_id', 'quantidade', 'data_validade')->with('alimento:id,nome,unidade_medida')->get();

        return response()->json(['estoque' => $estoque, 'erro' => 'n'], 200);
    }

    public function alterar_estoque(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:estoque,id',
            'alimento_id' => 'required|integer|exists:alimento,id',
            'quantidade' => 'required|integer|min:0',
            'data_fabricacao' => 'required|date',
            'data_validade' => 'required|date|after_or_equal:data_fabricacao',
            'funcionario_id' => 'required|integer|exists:funcionario,id',
        ]);

        try {

            $estoque = Estoque::find($request->id);
            $estoque->alimento_id = $request->alimento_id;
            $estoque->quantidade = $request->quantidade;
            $estoque->data_fabricacao = $request->data_fabricacao;
            $estoque->data_validade = $request->data_validade;
            $estoque->funcionario_id = $request->funcionario_id;
            $estoque->save();

            return response()->json(['message' => 'Estoque alterado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao alterar estoque: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }

    public function deletar_estoque(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:estoque,id',
        ]);

        try {
            $estoque = Estoque::find($request->id);
            $estoque->delete();

            return response()->json(['message' => 'Estoque deletado com sucesso!', 'erro' => 'n'], 200);

        } catch (\Throwable $th) {
            return response()->json(['message' => 'Erro ao deletar estoque: ', 'erro' => 's', 'msg_erro' => $th->getMessage()], 200);
        }
    }
}