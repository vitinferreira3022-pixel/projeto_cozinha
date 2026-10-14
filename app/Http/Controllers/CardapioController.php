<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CardapioController extends Controller
{
    public function cardapio_html(Request $request)
    {
        return view('cardapio');
    }
}
