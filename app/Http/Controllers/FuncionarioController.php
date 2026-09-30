<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function funcionario_html(Request $request)
    {
        return view('cadastro_funcionario');
    }
}
