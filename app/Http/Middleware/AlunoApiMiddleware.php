<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;
use App\Models\Aluno;
use App\Models\AlunoToken;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AlunoApiMiddleware
{
    public function handle(Request $Request, Closure $next): Response
    {
        if($Request->has('token') && $Request->has('aluno_id')){
            $token = AlunoToken::where('aluno_id', $Request->aluno_id)
            ->where('token', $Request->token)
            ->where('valido_ate','>', Carbon::now())
            ->first();
            
            if($token){
                return $next($Request);
            }

            return response()->json(['message'=>'Token inválido ou expirado', 'erro' => 's'],200);
        }else{
            return response()->json(['message'=>'Token não fornecido', 'erro' => 's'],200);
        }
        
    }
}