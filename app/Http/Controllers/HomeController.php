<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function mostrarHome(Request $request){
        $funcionario = $request->funcionario;
        $aluno = $request->aluno;
        return view('home')->with('funcionario', $funcionario)->with('aluno', $aluno);
    }
}

