<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\FuncionarioToken;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Funcionario;

class FuncionarioApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('token') && $request->has('funcionario_id')){
            $token = FuncionarioToken::where('funcionario_id', $request->funcionario_id)
            ->where('token', $request->token)
            ->where('valido_ate', '>', Carbon::now())
            ->first();
            if($token){
                return $next($request);
            
            }
            return response()->json(['message' => 'Token inválido ou expirado', 'erro' => 's'], 200);

        }else{
            return response()->json(['message' => 'Token não fornecido', 'erro' => 's'], 200);
        }
    }
}
