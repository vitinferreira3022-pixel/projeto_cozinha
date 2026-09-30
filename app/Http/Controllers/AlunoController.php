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
}
