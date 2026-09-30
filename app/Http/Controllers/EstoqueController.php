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
}
